<php?

	    $usdpay['config']=[];
	    $usdpay['config']['host']='https://usdpay.xyz';
	    $usdpay['config']['path']='/submit.php';
	    $usdpay['config']['id']='';
	    $usdpay['config']['key']='';
	    
	    $usdpay['data']=[];
        $usdpay['data']['pid']=$usdpay['config']['id'];
        $usdpay['data']['type']=$pay;
        $usdpay['data']['out_trade_no']=$data['order_no'];
        $usdpay['data']['notify_url']='http'.($_SERVER["HTTPS"] == 'on' ? 's' : '').'://'.$_SERVER["HTTP_HOST"].'/index/user/notify.html';
        $usdpay['data']['return_url']='http'.($_SERVER["HTTPS"] == 'on' ? 's' : '').'://'.$_SERVER["HTTP_HOST"].'/index/user/userinfo.html';
        $usdpay['data']['name']='name';
        $usdpay['data']['money']=number_format($price, 2, '.', '');;
        $usdpay['data']['sitename']='sitename';
        
        $usdpay['temp']=[];
        $usdpay['temp']['sign_str']='';
        ksort($usdpay['data']);
        foreach ($usdpay['data'] as $key=>$val){ $usdpay['temp']['sign_str'].='&'.$key.'='.$val; }
        $usdpay['temp']['sign_str']=substr($usdpay['temp']['sign_str'],1).''.$usdpay['config']['key'];
        $usdpay['temp']['sign_string']=htmlspecialchars($usdpay['temp']['sign_str']);
        $usdpay['data']['sign']=md5($usdpay['temp']['sign_str']);
        $usdpay['data']['sign_type']='md5';
        
        $usdpay['request']=[];
        $usdpay['request']['str']=http_build_query($usdpay['data']);
        $usdpay['request']['string']=htmlspecialchars($usdpay['request']['str']);
        $usdpay['request']['url']=$usdpay['config']['host'].$usdpay['config']['path'].'?'.$usdpay['request']['string'];
        $usdpay['response']=[];
        header('Location:'.$usdpay['request']['url']);exit();
        //exit('<a href="'.$usdpay['request']['url'].'">'.$usdpay['request']['url'].'</a>');
 
?>

