<?php

class CookieController extends ControllerBase
{

    public function getCategoryAction(){
        $categories = Category::find(array(
            'order' => 'categoryid asc'
        ));

        $response = new \Phalcon\Http\Response();
	    $response->setHeader("Access-Control-Allow-Origin: *");
        $response->setHeader("Content-Type", "application/json");
        $response->setJsonContent($categories->toArray());
        $this->view->disable();
        return $response;
    }

    public function getProductAction($categoryid){
        $catid = intval($categoryid);
        if($catid == 0){
            $products = Product::find(array(
                'order' => 'productid asc'
            ));
        }else{
            $products = Product::find(array(
                'conditions' => 'catid = ?0',
                'bind' => array(0 => $catid),
                'order' => 'productid asc'
            ));
        }
        
        $response = new \Phalcon\Http\Response();
	    $response->setHeader("Access-Control-Allow-Origin: *");
	    $response->setHeader("Content-Type", "application/json");
        $response->setJsonContent($products->toArray());
        $this->view->disable();
        return $response;
    }

}

