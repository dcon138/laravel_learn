<?php
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

abstract class RestResourceController extends \BaseController {
    
    protected $resourceModel;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $model = $this->resourceModel;
        return $model::all();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        throw new NotFoundHttpException();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $model = $this->resourceModel;
        $errors = $model::getValidationErrors(Input::all(), $model);
        
        if ($errors === false) {
            $entity = $model::create(Input::all());
            $response = Response::make($entity, 201);
            $response->header('Location', action(get_class($this) . '@show', $entity->id));
        } else {
            $response = Response::make($errors, 400);
        }
        return $response;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $model = $this->resourceModel;
        return $model::find($id);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        throw new NotFoundHttpException();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $model = $this->resourceModel;
        $model::destroy($id);
        return Response::make(null, 204);
    }

}
