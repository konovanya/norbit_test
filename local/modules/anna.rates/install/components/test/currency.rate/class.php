<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

class CurrencyRateComponent extends \CBitrixComponent
{

	protected const RESOURCE = 'https://www.cbr-xml-daily.ru/daily.xml';

	protected function getResult($currencyRates)
	{
		if(isset($currencyRates["Valute"])){
			$rateCodeArr = array_column($currencyRates["Valute"], 'CharCode');
			$rates = array_combine($rateCodeArr, $currencyRates["Valute"]);

			foreach ($this->arParams['RATE_CODE'] as $code) {
				if(isset($rates[$code])){
					$this->arResult['CURRENCY_RATES'][] =[
						"CODE" => $rates[$code]['CharCode'],
						"NOMINAL" => $rates[$code]['Nominal'],
						"NAME" => $rates[$code]['Name'],
						"VALUE" => $rates[$code]['Value'],
					];
				}
			}
		} else{
			throw new Exception("Формат выгрузки валют изменился, необходимв проверка");
		}
	}

	protected function getRatesFromCbrXml()
    {
        $httpClient = new \Bitrix\Main\Web\HttpClient();
        $currenciesDataString = $httpClient->get(self::RESOURCE);
        $currenciesData = simplexml_load_string($currenciesDataString);

        if (!is_object($currenciesData)) {
            return false;
        }

        $currenciesData = json_encode($currenciesData);
        $currenciesData = json_decode($currenciesData,TRUE);

        return $currenciesData;
    }
	

	public function executeComponent()
	{
		try
		{
			if ($this->StartResultCache()){
				$currencyRates = $this->getRatesFromCbrXml();
				if(!$currencyRates){
					throw new Exception("Не удалось получить текущие курсы валют");
				}
				$this->getResult($currencyRates);
				$this->includeComponentTemplate();
			}
		}
		catch (Exception $e)
		{
			$this->abortResultCache();
			ShowError($e->getMessage());
		}
	}
}
?>