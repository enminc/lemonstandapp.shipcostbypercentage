<?php

	class ShipCostByPercentage_Module extends Core_ModuleBase
	{
		/**
		 * Creates the module information object
		 * @return Core_ModuleInfo
		 */
		protected function createModuleInfo()
		{
			return new Core_ModuleInfo(
				"Ship Cost By Percentage",
				"Recalculates shipping cost quote is value starts with decimal to signify a percentage",
				"Ethan New Media Inc." );
		}

		public function subscribeEvents()
		{
			Backend::$events->addEvent('shop:onUpdateShippingQuote', $this, 'update_shipping_quote');
		}
		 
		public function update_shipping_quote($shipping_option, $params)
		{
			if(substr($params['quote'], 0,1) == '.'){ // if its a decimal we have a percentage 
				if($params['total_price'] >= 501){
					$params['quote'] = $params['total_price'] * $params['quote'];
				}
			}

			return $params['quote'];
		}

	}
	
?>