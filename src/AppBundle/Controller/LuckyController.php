<?php
/**
 * Created by PhpStorm.
 * User: zhaoguanglai
 * Date: 2017/11/22
 * Time: 15:03
 */

namespace AppBundle\Controller;


use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Cache\Simple\RedisCache;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number/{max}",
     *     name="lucky_number",
     *     defaults={"max":100})
     */
    public function numberAction($max,LoggerInterface $logger)
    {
        $number = mt_rand(0, $max);
        $url = $this->generateUrl('blog_show',['slug'=>'slug-value','year'=>2017]);
        $logger->info('we are logger!');
        /**
         * 三种重定向方法
         */
//        return $this->redirectToRoute('homepage');
//        return new RedirectResponse($this->generateUrl('homepage'));
//        return $this->redirect($url);
        return $this->render('lucky/number.html.twig',
            array('number'=>$number,'url'=>$url));
    }
}