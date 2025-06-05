<?php 

namespace App\Filters;

use Illuminate\Http\Request;

class TaskFilters
{
    protected $request;
    protected $builder;

    protected $filters = ['status', 'priority', 'name'];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply($builder)
    {
        $this->builder = $builder;

        foreach ($this->filters as $filter) {
            if (method_exists($this, $filter) && $this->request->filled($filter)) {
                $this->$filter($this->request->input($filter));
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

?>