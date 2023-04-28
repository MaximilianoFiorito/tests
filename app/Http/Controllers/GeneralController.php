<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    //
    public function calculateMoney(Request $request)
    {
        $data = $request->all();

        $compareAmount = $data['maxi_value'] + $data['guille_value'];

        //Paid with the exact amount
        if($data['total_value'] == $compareAmount)
        {
            // Money debt in case members pays the extra items
            $moneyDebtCoop = $compareAmount - $data['both_value'];
            //$amountPerMember = $moneyDebtCoop / $data['members_value'];

            // Money debt in case coop pays the extra items
            $eachMoney = $data['both_value'] / 2;
        
            //Paid amoun - half of the item bought
            $maxi = $data['maxi_value'] - $eachMoney;
            $guille = $data['guille_value'] - $eachMoney;

            //Values
            dd('Maxi receives: '. $maxi, 'Guille receives: '. $guille, 'Coop pays: '. $moneyDebtCoop);
        } else {
            dd('Amount paid with total price doesn´t match');
        }
    }
}
