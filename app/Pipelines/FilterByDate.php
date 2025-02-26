<?php

namespace App\Pipelines;

use Carbon\Carbon;
use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;

class FilterByDate
{
  public function __construct(private ?string $date_start, private ?string $date_end) {}

  public function __invoke(Builder $builder, Closure $next)
  {
    if (!$this->date_start || !$this->date_end) {
      return $next($builder);
    }
    Log::info("FilterByDate: $this->date_start - $this->date_end");
    $builder->whereBetween('created_at', [Carbon::parse($this->date_start)->startOfDay(), Carbon::parse($this->date_end)->endOfDay()]);
    return $next($builder);
  }
}
