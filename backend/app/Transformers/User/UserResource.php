<?php

namespace App\Transformers\User;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Services\ResponseService;

class UserResource extends JsonResource
{
    /**
     * @var
     */
    private $config;

    /**
     * Create a new resource instance
     *
     * @param  mixed  $resource
     * @return void
     */
    public function __construct($resource, $config = array())
    {
        // Ensure you call the parent constructor
        parent::__construct($resource);

        $this->config = $config;
    }
    
    /**
     * Convert data into array
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => '*********'
        ];
    }

    /**
     * Get additional data that should be returned with the resource array
     *
     * @param \Illuminate\Http\Request  $request
     * @return array
     */
    public function with($request)
    {
        return ResponseService::default($this->config,$this->id);
    }

    /**
     * Customize the output response for the data
     *
     * @param  \Illuminate\Http\Request
     * @param  \Illuminate\Http\Response
     * @return void
     */
    public function withResponse($request, $response)
    {
        $response->setStatusCode(200);
    }
}