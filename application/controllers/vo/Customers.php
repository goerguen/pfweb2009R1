<?php

class Customers {

	private $customersList = array();
	
	
	public function getCustomersList () {
		return $this->customersList;
	}
	
	public function setCustomersList (array $customersList) {
		$this->customersList = $customersList;
	}
	
}

?>