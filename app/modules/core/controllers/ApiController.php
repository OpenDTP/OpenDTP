<?php



class ApiController extends Controller
{
  protected $api_url = "http://192.168.57.101/api/v1/";

  public function getShow($model, $id)
  {
    Api::get($query);
    return View::make('core::site.' . $model . '.show')->with('response', $response->body->data);
  }

  public function putEdit($model, $id)
  {
    $response = Httpful::post($this->api_url . $model . '/' . $id)->authenticateWith('admin', 'admin')->body()->send();
    // return View::make('core::site.' . $model . '.show')->with('response', $response->body->data);
  }
  public function getEdit($model, $id)
	{
    $response = Httpful::get($this->api_url . $model . '/' . $id)->authenticateWith('admin', 'admin')->send();
    return View::make('core::site.' . $model . '.edit')->with('response', $response->body->data);
	}
}
