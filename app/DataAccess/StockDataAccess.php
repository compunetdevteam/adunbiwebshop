<?php
namespace App\DataAccess\StockDataAccess;

use App\Stock;

class StockDataAccess
{
	protected $stockModel;

	public function __construct(Stock $db)
	{
		$this->stockModel = $db;
	}

	/**
	 * Get Items from stock and Show 20 at a time
	 * @return  Returns a paginator instance
	 */
	public function ShowAllStockItems()
	{
		$stockItems = Stock::paginate(20);
		return $stockItems;
	}
}