<div class="row">

    <div class="col-md-4">

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-horizontal">

                    <div class="form-group">
                        {{ Form::label('tt', 'Trouble Ticket:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                            {{ Form::text('tt', null, ['class' => 'form-control', 'id' => 'tt']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('circuit', 'Nama Site:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                            {{ Form::select('circuit', $circuits, null, ['class' => 'form-control', 'id' => 'circuit']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('status', 'Status:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                            {{ Form::select('status',['Open' => 'Open', 'Close' => 'Close'] , null, ['class' => 'form-control', 'id' => 'status']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('action', 'Action:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                            {{ Form::text('action', null, ['class' => 'form-control', 'id' => 'action']) }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-horizontal">

                    <div class="form-group">
                        {{ Form::label('start', 'Problem Start:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                            {{-- <input type="datetime" name="start" id="start" class="form-control input-group date form_datetime"> --}}
                            {{ Form::text('start', null, ['class' => 'form-control input-group date form_datetime', 'id' => 'start']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('finish', 'Problem Finish:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                            {{-- <input type="datetime" name="finish" id="finish" class="form-control input-group date form_datetime"> --}}

                            {{ Form::text('finish', null, ['class' => 'form-control input-group date form_datetime', 'id' => 'finish']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('channel', 'Channel:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                            {{ Form::select('channel', ['Alarm' => 'Alarm', 'Email' => 'Email', 'Call' => 'Call'], null, ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('segment', 'Segment:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::select('segment', ['Belum Dipilih' => 'Silahkan Pilih', 'Customer' => 'Customer', 'SBP' => 'SBP', 'Vendor' => 'Vendor', 'Upstream' => 'Upstream'], null, ['class' => 'form-control', 'id' => 'segment']) }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="col-md-4">

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-horizontal">

                    <div class="form-group">
                        {{ Form::label('kategori', 'Kategori:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                            {{ Form::select('kategori', $category, null, ['class' => 'form-control', 'id' => 'kategori']) }}

                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('problem', 'Problem:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                            {{ Form::select('problem', $masalah, null, ['class' => 'form-control', 'id' => 'problem']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('sub_problem', 'Sub Problem:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                            {{ Form::select('sub_problem', $sub, null, ['class' => 'form-control', 'id' => 'sub_problem']) }}
                        </div>
                    </div>

                    <div class="form-group">
                            {{ Form::label('level', 'Level:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                            {{ Form::select('level', ['1st Level' => '1st Level', '2st Level' => '2st Level', '3st Level' => '3st Level', '4st Level' => '4st Level'],null, ['class' => 'form-control', 'id' => 'level']) }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
<div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-horizontal">

                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('rfo', 'Reason for Outage:', ['class' => 'col-sm-2']) }}
                            <div class="col-sm-10">
                                {{ Form::textarea('rfo', null, ['class' => 'form-control', 'id' => 'rfo', 'rows' => '5']) }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('real_problem', 'Real Problem:', ['class' => 'col-sm-2']) }}
                            <div class="col-sm-10">
                                {{ Form::textarea('real_problem', null, ['class' => 'form-control', 'rows' => '5', 'id' => 'real_problem']) }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('keterangan', 'Note:', ['class' => 'col-sm-2']) }}
                            <div class="col-sm-10">
                                {{ Form::textarea('keterangan', null, ['class' => 'form-control', 'rows' => '5', 'id' => 'keterangan']) }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

</div></div>