<?php

namespace App\Filters;

use Illuminate\Http\Request;

class TaskFilters
{
    protected $request;
    protected $builder;

    protected $filters = [
        'status_filter' => 'status',
        'priority_filter' => 'priority',
        'name_filter' => 'name',
    ];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply($builder)
    {
        $this->builder = $builder;

        foreach ($this->filters as $input => $method) {
            if (method_exists($this, $method) && $this->request->filled($input)) {
                $this->$method($this->request->input($input));
            }
        }
        return $this->builder;
    }

    protected function status($value)
    {
        $this->builder->where('status', $value);
    }

    protected function priority($value)
    {
        $this->builder->where('priority', $value);
    }

    protected function name($value)
    {
        $this->builder->where('name', 'like', "%$value%");
    }
}
