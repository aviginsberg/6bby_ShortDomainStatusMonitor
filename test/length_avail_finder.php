<?php
/**
 * User: aviginsberg
 * IDE: PhpStorm.
 * Date: 6/13/15
 */

//kill this test script since it's now on the production server and could interfere with things if run by accident
die();

$all_tlds = "ac,ad,ae,af,ag,ai,al,am,ao,aq,ar,as,at,au,aw,ax,az,ba,bb,bd,be,bf,bg,bh,bi,bj,bm,bn,bo,br,bs,bt,bw,by,bz,ca,cc,cd,cf,cg,ch,ci,ck,cl,cm,cn,co,cr,cu,cv,cw,cx,cy,cz,de,dj,dk,dm,do,dz,ec,ee,eg,er,es,et,eu,fi,fj,fk,fm,fo,fr,ga,gd,ge,gf,gg,gh,gi,gl,gm,gn,gp,gq,gr,gs,gt,gu,gw,gy,hk,hm,hn,hr,ht,hu,id,ie,il,im,in,io,iq,ir,is,it,je,jm,jo,jp,ke,kg,kh,ki,km,kn,kp,kr,kw,ky,kz,la,lb,lc,li,lk,lr,ls,lt,lu,lv,ly,ma,mc,md,me,mg,mh,mk,ml,mm,mn,mo,mp,mq,mr,ms,mt,mu,mv,mw,mx,my,mz,na,nc,ne,nf,ng,ni,nl,no,np,nr,nu,nz,om,pa,pe,pf,pg,ph,pk,pl,pm,pn,pr,ps,pt,pw,py,qa,re,ro,rs,ru,rw,sa,sb,sc,sd,se,sg,sh,si,sk,sl,sm,sn,so,sr,ss,st,su,sv,sx,sy,sz,tc,td,tf,tg,th,tj,tk,tl,tm,tn,to,tr,tt,tv,tw,tz,ua,ug,uk,us,uy,uz,va,vc,ve,vg,vi,vn,vu,wf,ws,ye,yt,za,zm,zw";

$tlds = explode(',',$all_tlds);

$masterlist = Array();
$threechar = Array();
$twochar = Array();


foreach($tlds as $tld)
{

    $url = "https://101domain.com/$tld.htm";

    echo "Curling: $url";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_URL, $url);


    $source = curl_exec($ch);

    curl_close($ch);

    //print_r($source);

    $regex1 = '/have\sminimum\sof\s(\d)\sand\sa\smaximum\sof/';

    preg_match($regex1, $source, $matches);

    array_push($masterlist,$tld.": ".$matches[1][0]."\n");

    echo " | Result: ".$matches[1][0]."\n";

    if($matches[1][0]==2||$matches[1][0]==1){
        array_push($twochar,$tld."\n");
    }
    if($matches[1][0]==3){
        array_push($threechar,$tld."\n");
    }



}

file_put_contents("masterlist.txt",$masterlist);
file_put_contents("2char.txt",$twochar);
file_put_contents("3char.txt",$threechar);