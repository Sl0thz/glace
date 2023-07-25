$submit = $_POST['btnUpdate'];
if($submit == "Update"){
    $x = 0;

    foreach($_SESSION["cart_array"] as $each_product){
        @$i++;
        $quantity = $_POST['txtQuan'.$x];
        $prodStock = $_POST['txtHoldQuan'.$x];
        $prodAdjustId = $_POST['txtHoldProdId'.$x++];
        if($quantity<1){ $quantity = 1; }
        if($quantity>$prodStock){ $quantity = $prodStock; }
        while(list($key,$value)=each($each_product)){
            array_splice($_SESSION["cart_array"],$i-1,1,array(array("productID"=>$prodAdjustId,"quantity"=>$quantity)));
        }       
    }


}