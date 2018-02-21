@extends('layouts.backstage')

@section('jumbotron')
<h1>Builds</h1>
@endsection

@section('toolbar')
<a class="btn btn-default" href="#newBuildModal" data-toggle="modal" data-target="#newBuildModal"><i class="fal fa-fw fa-plus"></i> New build</a>
@endsection

@section('content')
<div class="col-md-12 list-bar-group">
    <div class="row">
        @foreach ( $builds as $build )
            @if ( $build->milestone_id != $current_milestone )
                <div class="col-xl-12">
                    <h2>{{ \App\Milestone::find( $build->milestone_id )->name }}</h2>
                </div>
                @php
                    $current_milestone = $build->milestone_id
                @endphp
            @endif
            <div class="col-md-3">
                <div class="row list-bar">
                    <a class="col-8 list-bar-item list-bar-default" href="{{ route('showBuild', ['id' => $build->id]) }}">{{ $build->getString() }}</a>
                    <a class="col-2 list-bar-item list-bar-success text-center" href="{{ route('promoteBuildNow', ['build' => $build->id]) }}"><i class="fal fa-fw fa-angle-double-up"></i></a>
                    <a class="col-2 list-bar-item list-bar-danger text-center" href="{{ route('deleteBuild', ['id' => $build->id]) }}"><i class="fal fa-fw fa-trash-alt"></i></a>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="col-md-12">
    {{ $builds->links() }}
</div>
@endsection

@section('modals')
<div class="modal fade" id="newBuildModal" tabindex="-1" role="dialog" aria-labelledby="newBuildModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New build</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-fw fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('storeBuild') }}" class="row row-p-10">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" id="build_id" name="build_id" aria-describedby="build_id" value="{{ $build->id }}">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="build_string">String</label>
                            <input type="text" class="form-control" id="build_string" name="build_string" aria-describedby="build_string" placeholder="Build string" value="10.0.">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="release">Date</label>
                            <input type="date" class="form-control" id="release" name="release" aria-describedby="release" placeholder="Date">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm">
                        <label for="ring" class="control-label extra-margin">PC</label>
                        <div class="checkbox"><label><input type="checkbox" name="flight[1][vnext]" value="0"> <span class="label leak">vNext</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="flight[1][skip]" value="1"> <span class="label skip">Skip Ahead</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="flight[1][fast]" value="2"> <span class="label fast">Fast Ring</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="flight[1][slow]" value="3"> <span class="label slow">Slow Ring</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="flight[1][preview]" value="5"> <span class="label release">Release Preview</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="flight[1][targeted]" value="6"> <span class="label targeted">Semi-Annual Targeted</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="flight[1][broad]" value="7"> <span class="label broad">Semi-Annual Broad</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="flight[1][ltsc]" value="8"> <span class="label lts">Long-Term Servicing Channel</span></label></div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm">
                        <label for="ring" class="control-label extra-margin">Mobile</label>
                        <div class="checkbox"><label><input type="checkbox" name="flight[2][vnext]" value="0"> <span class="label leak">vNext</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="flight[2][fast]" value="2"> <span class="label fast">Fast Ring</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="flight[2][slow]" value="3"> <span class="label slow">Slow Ring</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="flight[2][preview]" value="5"> <span class="label release">Release Preview</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="flight[2][targeted]" value="6"> <span class="label targeted">Semi-Annual Targeted</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="flight[2][broad]" value="7"> <span class="label broad">Semi-Annual Broad</span></label></div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm">
                        <label for="ring" class="control-label extra-margin">Xbox</label>
                        <div class="checkbox"><label><input type="checkbox" name="flight[3][vnext]" value="0"> <span class="label leak">vNext</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="flight[3][fast]" value="2"> <span class="label fast">Alpha Ring</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="flight[3][slow]" value="3"> <span class="label slow">Beta Ring</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="flight[3][preview]" value="4"> <span class="label preview">Delta Ring</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="flight[3][release]" value="5"> <span class="label release">Omega Ring</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="flight[3][targeted]" value="6"> <span class="label targeted">Production</span></label></div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm">
                        <label for="ring" class="control-label extra-margin">Server</label>
                        <div class="checkbox"><label><input type="checkbox" name="flight[4][vnext]" value="0"> <span class="label leak">vNext</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="flight[4][slow]" value="3"> <span class="label slow">Preview</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="flight[4][targeted]" value="7"> <span class="label targeted">Semi-Annual Targeted</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="flight[4][broad]" value="7"> <span class="label broad">Semi-Annual Broad</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="flight[4][ltsc]" value="8"> <span class="label lts">Long-Term Servicing Channel</span></label></div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm">
                        <label for="ring" class="control-label extra-margin">Mixed Reality</label>
                        <div class="checkbox"><label><input type="checkbox" name="flight[5][vnext]" value="0"> <span class="label leak">vNext</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="flight[5][targeted]" value="6"> <span class="label targeted">Semi-Annual Targeted</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="flight[5][broad]" value="7"> <span class="label broad">Semi-Annual Broad</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="flight[5][ltsc]" value="8"> <span class="label lts">Long-Term Servicing Channel</span></label></div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm">
                        <label for="ring" class="control-label extra-margin">IoT</label>
                        <div class="checkbox"><label><input type="checkbox" name="flight[6][vnext]" value="0"> <span class="label leak">vNext</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="flight[6][slow]" value="3"> <span class="label slow">Preview</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="flight[6][targeted]" value="6"> <span class="label targeted">Semi-Annual Targeted</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="flight[6][broad]" value="7"> <span class="label broad">Semi-Annual Broad</span></label></div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm">
                        <label for="ring" class="control-label extra-margin">Team</label>
                        <div class="checkbox"><label><input type="checkbox" name="flight[7][vnext]" value="0"> <span class="label leak">vNext</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="flight[7][targeted]" value="6"> <span class="label targeted">Semi-Annual Targeted</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="flight[7][broad]" value="7"> <span class="label broad">Semi-Annual Broad</span></label></div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block"><i class="fal fa-fw fa-plus"></i> Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection