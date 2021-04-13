<div class="table-responsive">
    @if ($tickets->isNotEmpty())
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Ticket Reference</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ticket Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr>
                        <th scope="row"><a href="">{{ $ticket->ticket_ref }}</a></th>
                       
                        <td>
                            @if ($ticket->status)
                            <span class="badge badge-success">{{ 'closed' }}</span>
                        @else
                            <span class="badge badge-warning">{{ 'pending' }}</span>
                        @endif
                        </td>
                        <td>
                            {{ \Carbon\Carbon::parse($ticket->created_at)->toFormattedDateString() }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info" role="alert">
            <h6> {{ 'You have no pending tickets' }} </h6>
        </div>
    @endif
</div>
