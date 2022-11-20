<?php

namespace App\View\Components\Visitors;

use App\Models\Visitor;
use DateTime;
use Illuminate\View\Component;

class Delete extends Component
{
        /**
     * Visitor UUID.
     *
     * @var uuid
     */
    public $visitorUuid;

       /**
     * Visitor Name.
     *
     * @var String
     */
    public $visitorName;

       /**
     * Visitor Access Date and Time.
     *
     * @var DateTime
     */
    public $visitorDateTime;

    /**
     * Create a new component instance.
     *
     * @param  uuid  $visitorUuid
     * @return void
     */
    public function __construct($visitorUuid)
    {
        $this->visitorUuid = $visitorUuid;
        $this->visitorName = Visitor::select('name')->where('uuid', $visitorUuid)->first()->name;
        $this->visitorDateTime = Visitor::select('visit_datetime')->where('uuid', $visitorUuid)->first()->date_time;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.visitors.delete');
    }
}
