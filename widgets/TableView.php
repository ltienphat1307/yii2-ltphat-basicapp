<?php
namespace app\widgets;

use Yii;
use yii\base\Widget;

class TableView extends Widget
{
	public $dataProvider = [];
	public $headers = [];
	public $attributes = [];

    public function init()
    {
        parent::init();
    }

    public function run()
    {
    	$data = $this->dataProvider->getModels();

        if (count($data)) {
        	return $this->render('tableview', [
        		'data' => $data,
        		'attributes' => $this->attributes,
        		'headers' => $this->headers
        	]);
        }
    }
}
?>