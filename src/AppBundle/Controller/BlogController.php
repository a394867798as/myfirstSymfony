<?php
/**
 * Created by PhpStorm.
 * User: hc360
 * Date: 2017/11/29
 * Time: 17:23
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class BlogController extends Controller
{
    /**
     * @Route("/blog/{page}",name="blog_list",requirements={"page":"\d+"})
     * @author zhaoguanglai
     */
    public function listAction($page = 1){

    }

    /**
     * @Route("/articles/{_locale}/{year}/{slug}.{_format}",
     *     name="blog_show",
     *     defaults={"_format":"html"},
     *     requirements={
     *          "_local":"en|rf",
     *          "_format":"html|rss",
     *          "year":"\d+"
     *      }
     *  )
     * @param $_locale
     * @param $year
     * @param $slug
     * @return string
     * @throws \InvalidArgumentException
     */
     public function showAction($_locale, $year, $slug){

         $url = $this->generateUrl('blog_show',
             array('_locale'=>$_locale,'year'=>$year,'slug'=>$slug),
             UrlGeneratorInterface::ABSOLUTE_URL);

         return $this->render('blog/show.html.twig');
     }
}