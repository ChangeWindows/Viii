@extends('layouts.backstage')

@section('content')
<div class="col-md-12">
    <form method="POST" action="{{ route('storeDelta') }}" class="row row-p-10">
        <div class="col-12">
            <h1>
                New delta
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-fw fa-check"></i> Save</button>
            </h1>
        </div>
        {{ csrf_field() }}
        <input type="hidden" class="form-control" id="build_id" name="build_id" aria-describedby="build_id" value="{{ $build->id }}">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="build_string">String</label>
                <input type="text" class="form-control" id="build_string" name="build_string" aria-describedby="build_string" placeholder="Build string" value="10.0.{{ $build->id }}.">
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="release">Date</label>
                <input type="date" class="form-control" id="release" name="release" aria-describedby="release" placeholder="Date">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="changelog">Changelog</label>
                <textarea class="form-control" id="changelog" name="changelog" aria-describedby="changelog" placeholder="Changelog"></textarea>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <label for="ring" class="control-label extra-margin">PC</label>
            <div class="checkbox"><label><input type="checkbox" name="pc_vnext" value="1"> <span class="label leak">vNext</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="pc_fast" value="1"> <span class="label fast">Fast Ring</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="pc_slow" value="1"> <span class="label slow">Slow Ring</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="pc_preview" value="1"> <span class="label release">Release Preview</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="pc_pilot" value="1"> <span class="label pilot">Semi Annual Pilot</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="pc_broad" value="1"> <span class="label broad">Semi Annual Broad</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="pc_ltsc" value="1"> <span class="label ltsc">Long-Term Servicing Channel</span></label></div>
        </div>
        <div class="col-md-4 col-sm-6">
            <label for="ring" class="control-label extra-margin">Mobile</label>
            <div class="checkbox"><label><input type="checkbox" name="mobile_vnext" value="1"> <span class="label leak">vNext</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="mobile_fast" value="1"> <span class="label fast">Fast Ring</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="mobile_slow" value="1"> <span class="label slow">Slow Ring</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="mobile_preview" value="1"> <span class="label release">Release Preview</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="mobile_pilot" value="1"> <span class="label pilot">Semi Annual Pilot</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="mobile_broad" value="1"> <span class="label broad">Semi Annual Broad</span></label></div>
        </div>
        <div class="col-md-4 col-sm-6">
            <label for="ring" class="control-label extra-margin">Xbox</label>
            <div class="checkbox"><label><input type="checkbox" name="xbox_vnext" value="1"> <span class="label leak">vNext</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="xbox_fast" value="1"> <span class="label fast">Alpha Ring</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="xbox_slow" value="1"> <span class="label slow">Beta Ring</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="xbox_preview" value="1"> <span class="label preview">Ring 3</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="xbox_release" value="1"> <span class="label release">Ring 4</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="xbox_pilot" value="1"> <span class="label pilot">Semi Annual Pilot</span></label></div>
        </div>
        <div class="col-md-4 col-sm-6">
            <label for="ring" class="control-label extra-margin">Server</label>
            <div class="checkbox"><label><input type="checkbox" name="server_vnext" value="1"> <span class="label leak">vNext</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="server_broad" value="1"> <span class="label broad">Semi Annual Broad</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="server_ltsc" value="1"> <span class="label ltsc">Long-Term Servicing Channel</span></label></div>
        </div>
        <div class="col-md-4 col-sm-6">
            <label for="ring" class="control-label extra-margin">Mixed Reality</label>
            <div class="checkbox"><label><input type="checkbox" name="reality_vnext" value="1"> <span class="label leak">vNext</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="reality_pilot" value="1"> <span class="label pilot">Semi Annual Pilot</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="reality_broad" value="1"> <span class="label broad">Semi Annual Broad</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="reality_ltsc" value="1"> <span class="label ltsc">Long-Term Servicing Channel</span></label></div>
        </div>
        <div class="col-md-4 col-sm-6">
            <label for="ring" class="control-label extra-margin">IoT</label>
            <div class="checkbox"><label><input type="checkbox" name="iot_vnext" value="1"> <span class="label leak">vNext</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="iot_slow" value="1"> <span class="label slow">Preview Ring</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="iot_pilot" value="1"> <span class="label pilot">Semi Annual Pilot</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="iot_broad" value="1"> <span class="label broad">Semi Annual Broad</span></label></div>
        </div>
        <div class="col-md-4 col-sm-6">
            <label for="ring" class="control-label extra-margin">Team</label>
            <div class="checkbox"><label><input type="checkbox" name="team_vnext" value="1"> <span class="label leak">vNext</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="team_pilot" value="1"> <span class="label pilot">Semi Annual Pilot</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="team_broad" value="1"> <span class="label broad">Semi Annual Broad</span></label></div>
        </div>
    </form>
</div>
@endsection