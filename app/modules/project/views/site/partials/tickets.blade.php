<div class="col-md-6">
    <h3>{{{$ticket->name}}}</h3>
    <p>{{{$ticket->description}}}</p>
    <hr />
    <p><strong>result :</strong> {{{$ticket->result}}}</p>
    <p><strong>version :</strong> {{{$ticket->version}}}</p>
    <p><strong>run associated :</strong> {{{$ticket->run_num}}}</p>
    <p><strong>status :</strong> Validated</p>
    <p><strong>last progress :</strong> {{{$ticket->updated_at}}}</p>
    <hr />
    <h4>Files attached to this document</h4>
    <table class="table table-hover table-condensed attached-files">
        <thead>
            <th>file</th>
            <th>type</th>
            <th>action</th>
        </thead>
        <tbody>
        <tr>
            <td>logoopendtp.png</td>
            <td>image</td>
            <td class="actions">
                <div class="btn-group">
                    <button type="button" class="btn btn-default" data-toggle="tooltip" title="download">
                        <span class="glyphicon glyphicon-cloud-download"></span>
                    </button>
                    <button type="button" class="btn btn-default" data-toggle="tooltip" title="upload">
                        <span class="glyphicon glyphicon-cloud-upload"></span>
                    </button>
                    <button type="button" class="btn btn-danger" data-toggle="tooltip" title="remove">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="col-md-3">
    <div class="thumbnail">
        <img src="/images/shared/placeholders/michael.jpeg" alt="lindt">
        <div class="caption">
            <p><strong>assigned to :</strong> Michael FORASTE </p>
            <div class="btn-group">
                <button type="button" class="btn btn-default" data-toggle="tooltip" title="change">
                    <span class="glyphicon glyphicon-user"></span>
                </button>
                <button type="button" class="btn btn-danger" data-toggle="tooltip" title="remove">
                    <span class="glyphicon glyphicon-remove-sign"></span>
                </button>
            </div>
        </div>
    </div>
</div>
