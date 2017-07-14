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
            <div class="checkbox"><label><input type="checkbox" name="delta[1][vnext]" value="1"> <span class="label leak">vNext</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="delta[1][fast]" value="2"> <span class="label fast">Fast Ring</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="delta[1][slow]" value="3"> <span class="label slow">Slow Ring</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="delta[1][preview]" value="5"> <span class="label release">Release Preview</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="delta[1][pilot]" value="6"> <span class="label pilot">Semi Annual Pilot</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="delta[1][broad]" value="7"> <span class="label broad">Semi Annual Broad</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="delta[1][ltsc]" value="8"> <span class="label ltsc">Long-Term Servicing Channel</span></label></div>
        </div>
        <div class="col-md-4 col-sm-6">
            <label for="ring" class="control-label extra-margin">Mobile</label>
            <div class="checkbox"><label><input type="checkbox" name="delta[2][vnext]" value="1"> <span class="label leak">vNext</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="delta[2][fast]" value="2"> <span class="label fast">Fast Ring</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="delta[2][slow]" value="3"> <span class="label slow">Slow Ring</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="delta[2][preview]" value="5"> <span class="label release">Release Preview</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="delta[2][pilot]" value="6"> <span class="label pilot">Semi Annual Pilot</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="delta[2][broad]" value="7"> <span class="label broad">Semi Annual Broad</span></label></div>
        </div>
        <div class="col-md-4 col-sm-6">
            <label for="ring" class="control-label extra-margin">Xbox</label>
            <div class="checkbox"><label><input type="checkbox" name="delta[3][vnext]" value="1"> <span class="label leak">vNext</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="delta[3][fast]" value="2"> <span class="label fast">Alpha Ring</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="delta[3][slow]" value="3"> <span class="label slow">Beta Ring</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="delta[3][preview]" value="4"> <span class="label preview">Ring 3</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="delta[3][release]" value="5"> <span class="label release">Ring 4</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="delta[3][pilot]" value="6"> <span class="label pilot">Production</span></label></div>
        </div>
        <div class="col-md-4 col-sm-6">
            <label for="ring" class="control-label extra-margin">Server</label>
            <div class="checkbox"><label><input type="checkbox" name="delta[4][vnext]" value="1"> <span class="label leak">vNext</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="delta[4][slow]" value="3"> <span class="label slow">Preview</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="delta[4][broad]" value="7"> <span class="label broad">Semi Annual Broad</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="delta[4][ltsc]" value="8"> <span class="label ltsc">Long-Term Servicing Channel</span></label></div>
        </div>
        <div class="col-md-4 col-sm-6">
            <label for="ring" class="control-label extra-margin">Mixed Reality</label>
            <div class="checkbox"><label><input type="checkbox" name="delta[5][vnext]" value="1"> <span class="label leak">vNext</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="delta[5][pilot]" value="6"> <span class="label pilot">Semi Annual Pilot</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="delta[5][broad]" value="7"> <span class="label broad">Semi Annual Broad</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="delta[5][ltsc]" value="8"> <span class="label ltsc">Long-Term Servicing Channel</span></label></div>
        </div>
        <div class="col-md-4 col-sm-6">
            <label for="ring" class="control-label extra-margin">IoT</label>
            <div class="checkbox"><label><input type="checkbox" name="delta[6][vnext]" value="1"> <span class="label leak">vNext</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="delta[6][slow]" value="3"> <span class="label slow">Preview</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="delta[6][pilot]" value="6"> <span class="label pilot">Semi Annual Pilot</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="delta[6][broad]" value="7"> <span class="label broad">Semi Annual Broad</span></label></div>
        </div>
        <div class="col-md-4 col-sm-6">
            <label for="ring" class="control-label extra-margin">Team</label>
            <div class="checkbox"><label><input type="checkbox" name="delta[7][vnext]" value="1"> <span class="label leak">vNext</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="delta[7][pilot]" value="6"> <span class="label pilot">Semi Annual Pilot</span></label></div>
            <div class="checkbox"><label><input type="checkbox" name="delta[7][broad]" value="7"> <span class="label broad">Semi Annual Broad</span></label></div>
        </div>
    </form>
</div>
@endsection