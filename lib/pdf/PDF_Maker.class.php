<?php
class PDF_Maker extends FPDI
{
	private $cachedFile = null;
	private static $config = null;
	private $needNewPage = false;
	private $empty = true;

	public function __construct()
	{
		if (!self::$config)
		{
			self::$config = sfTCPDFPluginConfigHandler::loadConfig('generico');
		}

		parent::__construct(self::$config['PDF_PAGE_ORIENTATION'], self::$config['PDF_UNIT'], self::$config['PDF_PAGE_FORMAT']);

		$this->SetCreator(self::$config['PDF_CREATOR']);
		$this->SetAuthor(self::$config['PDF_AUTHOR']);

		$this->SetHeaderData(self::$config['PDF_HEADER_LOGO'], self::$config['PDF_HEADER_LOGO_WIDTH'], self::$config['PDF_HEADER_TITLE'], self::$config['PDF_HEADER_STRING']);

		$this->SetHeaderFont(array(self::$config['PDF_FONT_NAME_MAIN'], '', self::$config['PDF_FONT_SIZE_MAIN']));
		$this->SetFooterFont(array(self::$config['PDF_FONT_NAME_DATA'], '', self::$config['PDF_FONT_SIZE_DATA']));

		$this->SetDefaultMonospacedFont(self::$config['PDF_FONT_MONOSPACED']);

		$this->SetMargins(self::$config['PDF_MARGIN_LEFT'], self::$config['PDF_MARGIN_TOP'], self::$config['PDF_MARGIN_RIGHT']);
		$this->SetHeaderMargin(self::$config['PDF_MARGIN_HEADER']);
		$this->SetFooterMargin(self::$config['PDF_MARGIN_FOOTER']);

		$this->SetAutoPageBreak(true, self::$config['PDF_MARGIN_BOTTOM']);

		$this->SetImageScale(self::$config['PDF_IMAGE_SCALE_RATIO']);

		$this->SetFont(self::$config['PDF_FONT_NAME_MAIN'], '', self::$config['PDF_FONT_SIZE_MAIN']);

		$this->SetCellHeightRatio(self::$config['K_CELL_HEIGHT_RATIO']);
	}

	public function addPdfText($html = '', $newLine = true)
	{
		$this->checkFirstPage();

		if ($this->needNewPage)
		{
			$this->AddPage(self::$config['PDF_PAGE_ORIENTATION'], self::$config['PDF_PAGE_FORMAT']);
			$this->needNewPage = false;
		}
		
		$this->writeHTML($html, $newLine, false, true, false, '');
		//Now we leave the cursor in the last page, ready for a future addition of more content
		$this->lastPage();
		$this->empty = false;
	}

	protected function AddPagePdf($orientation = '', $format = '')
	{
		if (!isset($this->original_lMargin))
		{
			$this->original_lMargin = $this->lMargin;
		}

		if (!isset($this->original_rMargin))
		{
			$this->original_rMargin = $this->rMargin;
		}

		// terminate previous page
		$this->endPage();
		// start new page
		$this->startPagePdf($orientation, $format);
	}

	protected function startPagePdf($orientation = '', $format = '')
	{
		if ($this->numpages > $this->page)
		{
			// this page has been already added
			$this->setPage($this->page + 1);
			$this->SetY($this->tMargin);
			return;
		}

		// start a new page
		if ($this->state == 0)
		{
			$this->Open();
		}
		++$this->numpages;
		$this->swapMargins($this->booklet);
		// save current graphic settings
		$gvars = $this->getGraphicVars();
		// start new page
		$this->_beginpage($orientation, $format);
		// mark page as open
		$this->pageopen[$this->page] = true;
		// restore graphic settings
		$this->setGraphicVars($gvars);
		// mark this point
		$this->setPageMark();
		// print page header
		//$this->setHeader();
		// restore graphic settings
		$this->setGraphicVars($gvars);
		// mark this point
		$this->setPageMark();
		// print table header (if any)
		//$this->setTableHeader();
	}

	public function addPdfFile($file)
	{
		if (!$this->empty)
			$this->checkFirstPage();

		$pagecount = $this->setSourceFile($file);
		for ($i = 1; $i <= $pagecount; $i++)
		{
			$tplidx = $this->ImportPage($i);
			$s = $this->getTemplatesize($tplidx);
			$this->AddPagePdf('P', array($s['w'], $s['h']));
			$this->Ln($s['h'], false);
			$this->useTemplate($tplidx);
		}

		$this->lastPage();
		$this->needNewPage = true;
		$this->empty = false;
	}

	public function checkFirstPage()
	{
		//check if there is already a page in the document. If there is no page it must be created before
		if ($this->getPage() == 0)
		{
			$this->AddPage(self::$config['PDF_PAGE_ORIENTATION'], self::$config['PDF_PAGE_FORMAT']);
		}
		else
		{
			$this->setPage($this->getPage(), false);//if there is already a page, the cursor must point to it
		}
	}

	public function getCachedFile()
	{
		return $this->cachedFile;
	}

	public function setCachedFile($cachedFile)
	{
		$this->cachedFile = $cachedFile;
	}

	public function Output($name = 'doc.pdf', $dest = 'I')
	{
		if ($this->getCachedFile())
		{
			$this->state = 3;
			$this->replaceBuffer(file_get_contents($this->getCachedFile()));
		}

		return parent::Output($name, $dest);
	}
}
