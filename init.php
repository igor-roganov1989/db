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
			$cache = Cache::createInstance(); // Служба кеширования

			$cachePath = 'mycachepath'; // папка, в которой лежит кеш
			$cacheTtl = 3600; // срок годности кеша (в секундах)
			$cacheKey = $_SERVER['HTTP_HOST']; // имя кеша
			 
			if ($cache->initCache($cacheTtl, $cacheKey, $cachePath))
			{
				$this->ciblock_el = $cache->getVars(); // Получаем переменные
			}
			elseif ($cache->startDataCache())
			{
			
				$this->ciblock_el = CIBlockElement::GetList(
					[],
					['IBLOCK_ID'=>self::IBLOCK_SITE_CONTENT,'ACTIVE'=>'Y','=PROPERTY_URL'=>$_SERVER['HTTP_HOST']],
					false,
					false,
					['IBLOCK_ID','ID','NAME','IBLOCK_SECTION_ID']
				)->GetNextElement();
				
				$vars = [
					 $this->ciblock_el,
				];
				 
				// Всё хорошо, записываем кеш
				$cache->endDataCache($vars);
			}

			
			
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