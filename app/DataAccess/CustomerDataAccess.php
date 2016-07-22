
<?php



namespace App;
use App\Http\Requests\Request;
use App\Sale;
use Illuminate\Database\Eloquent\Collection;
class CustomerDataAccess
{
//to list all customer from my DB;
    public function ListCustomers(){
        $customers = Sale::select('customername','customerphone','emailaddress')->get();
        return $customers;
    }
	
	
}
