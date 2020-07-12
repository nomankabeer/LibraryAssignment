<?php
/**
 * Created by PhpStorm.
 * User: Noman Kabeer
 * Date: 23-Jan-2020
 * Time: 1:10 AM
 */

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Client\RackRepository;

class RackController extends Controller{

    private $rackRepository = null;
    public function __construct(RackRepository $rackRepository){
    $this->rackRepository = $rackRepository;
    }
    public function getRacks(){

//        dd($this->powerSet([2,5,6,8 ] , 17));
        dd($this->powerSet([4 ,14 ,15, 18, 29, 32, 36 ,82, 95, 95 ] , 100));

        return $this->rackRepository->getRacks();
    }

    public function powerSet($in, $require , $minLength = 1) {
        $count = count($in);
        $members = pow(2,$count);
        $return = array();
        $nearest = 0;
        $set = array();
        for ($i = 0; $i < $members; $i++) {
            $b = sprintf("%0".$count."b",$i);
            $out = array();
            $sum = 0;
            for ($j = 0; $j < $count; $j++) {
                if ($b{$j} == '1') {
                    $out[] = $in[$j];
                    $sum = (int)$sum+(int)$in[$j];
                }
            }
            echo ' [ '.$sum.' ] ';
            if($sum == $require){
                $nearest = $sum;
                $set = $out;
                break;
            }
            elseif($sum < $require && $nearest < $sum){
                $nearest = $sum;
                $set = $out;

            }
            if (count($out) >= $minLength) {
                $return[] = $out;
            }
        }
        return [$nearest , $set];
    }



    public function detailRack($id){
        return $this->rackRepository->getRackDetail($id);
    }
}
