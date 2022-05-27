<?	
	CModule::IncludeModule('iblock');
	
	class SiteSettings{
		
		const IBLOCK_SITE_PAGES = 6;
		
		private static $siteIDandSectionID = [
			"m1" => 11, #Морги 
			"kl" => 9,  #Кладбища
			"k1" => 10  #Крематории
		];
		
		public static function getContentSectionBySiteID(){
			return self::$siteIDandSectionID[SITE_ID];	
		}
	}

	class IblockSiteContent{
		
		private const IBLOCK_SITE_CONTENT = 7;
		private static $instances = [];
		public  $ciblock_el;
		
		protected  function __construct(){
		
			$this->ciblock_el = CIBlockElement::GetList(
				[],
				['IBLOCK_ID'=>self::IBLOCK_SITE_CONTENT,'ACTIVE'=>'Y','=PROPERTY_URL'=>$_SERVER['HTTP_HOST']],
				false,
				false,
				['IBLOCK_ID','ID','NAME','IBLOCK_SECTION_ID']
			)->GetNextElement();
		}
		
		public static function getInstance()
		{
			$cls = static::class;
			if (!isset(self::$instances[$cls])) {
				self::$instances[$cls] = new static();
			}

			return self::$instances[$cls];
		}
		
		public function GetField($select = 'NAME'){
			return $this->ciblock_el->GetFields()[$select];
		}
		
		public function GetProperty($property){
			return $this->ciblock_el->GetProperties()[$property];
		}
		
		public function getProperties(){
			return $this->ciblock_el->GetProperties();
		}
		
		public function setDirSEO(){
			
			if ( $GLOBALS['APPLICATION']->GetCurPage() == '/' ){			
				$ipropSectionValues = new \Bitrix\Iblock\InheritedProperty\SectionValues(
											self::IBLOCK_SITE_CONTENT, 
											$this->GetField('IBLOCK_SECTION_ID')
										);
				$arSEO = $ipropSectionValues->getValues();
				if ( !empty( $arSEO['SECTION_META_TITLE'] ) ){
					
					$GLOBALS['APPLICATION']->SetPageProperty('title',$this->GetField('NAME').' '.$arSEO['SECTION_META_TITLE']);
				}
				
				if ( !empty( $arSEO['SECTION_META_DESCRIPTION'] ) ){
					
					$GLOBALS['APPLICATION']->SetPageProperty('description',$this->GetField('NAME').' '.$arSEO['SECTION_META_DESCRIPTION']);
				}
			
			}
			
		}
	}
	
	
	
	
	/*class IblockSiteContent{
		
		private const IBLOCK_SITE_CONTENT = 7;
		public $iblock_inst;
		
		public function __construct(){
			$this->getCIblockElement();
		}
		
		public function getFields(){
			return $this->iblock_inst->GetFields();
		}
		
		public function getProperties(){
			return $this->iblock_inst->GetProperties();
		}
		
		public  function getCIblockElement(){
			$this->iblock_inst = CIBlockElement::GetList(
				[],
				['IBLOCK_ID'=>self::IBLOCK_SITE_CONTENT,'ACTIVE'=>'Y','=PROPERTY_URL'=>$_SERVER['HTTP_HOST']],
				false,
				false,
				['IBLOCK_ID','ID','NAME']
			)->GetNextElement();
			
		}
	}*/
	?>