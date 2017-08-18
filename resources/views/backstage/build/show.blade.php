@extends('layouts.backstage')

@section('jumbotron')
<h1>Build {{ $build->id }}</h1>
@endsection

@section('toolbar')
<a class="btn btn-default" href="#newDeltaModal" data-toggle="modal" data-target="#newDeltaModal"><i class="fal fa-fw fa-plus"></i> New delta</a>
<a class="btn btn-default" href="#editBuildModal" data-toggle="modal" data-target="#editBuildModal"><i class="fal fa-fw fa-pencil"></i> Edit</a>
@endsection

@section('content')
<div class="col-md-12 list-bar-group">
    <div class="row">
        @foreach ( $flights as $flight )
            @if ( $flight->deltas->getString( 'delta' ) != $current_delta )
                <div class="col-xl-12">
                    <h2>{{ $flight->deltas->getString( 'delta' ) }}</h2>
                </div>
            @endif
            @if ( $flight->canPromote() )
                @php    
                    $main_col = 8;
                @endphp
            @else
                @php    
                    $main_col = 10;
                @endphp
            @endif
            @php    
                $current_delta = $flight->deltas->getString( 'delta' );
            @endphp
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="row list-bar">
                    <a class="col-{{ $main_col }} list-bar-item list-bar-default list-bar-indicate list-bar-{{ $flight->deltas->getPlatformName( 'class' ) }}" href="{{ route('editDelta', ['id' => $flight->id]) }}">{{ $flight->getRingName( 'short' ) }}</a>
                    @if ( $main_col == 8 )
                        <a class="col-2 list-bar-item list-bar-success text-center" href="{{ route('promoteDelta', ['id' => $flight->id]) }}"><i class="fal fa-fw fa-angle-double-up"></i></a>
                    @endif
                    <a class="col-2 list-bar-item list-bar-danger text-center" href="{{ route('deleteDelta', ['id' => $flight->id]) }}"><i class="fal fa-fw fa-trash-alt"></i></a>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="col-md-12">
    {{ $flights->links() }}
</div>
@endsection

@section('modals')
<div class="modal fade" id="newDeltaModal" tabindex="-1" role="dialog" aria-labelledby="newDeltaModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New delta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-fw fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('storeDelta') }}" class="row row-p-10">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" id="build_id" name="build_id" aria-describedby="build_id" value="{{ $build->id }}">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="build_string">String</label>
                            <input type="text" class="form-control" id="build_string" name="build_string" aria-describedby="build_string" placeholder="Build string" value="10.0.{{ $build->id }}.">
                        </div>
                    </div>
                    <div class="col-12">
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
                    <div class="col-sm-6">
                        <label for="ring" class="control-label extra-margin">PC</label>
                        <div class="checkbox"><label><input type="checkbox" name="delta[1][vnext]" value="1"> <span class="label leak">vNext</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="delta[1][fast]" value="2"> <span class="label fast">Fast Ring</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="delta[1][slow]" value="3"> <span class="label slow">Slow Ring</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="delta[1][preview]" value="5"> <span class="label release">Release Preview</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="delta[1][pilot]" value="6"> <span class="label pilot">Semi-Annual Pilot</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="delta[1][broad]" value="7"> <span class="label broad">Semi-Annual Broad</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="delta[1][ltsc]" value="8"> <span class="label ltsc">Long-Term Servicing Channel</span></label></div>
                    </div>
                    <div class="col-sm-6">
                        <label for="ring" class="control-label extra-margin">Mobile</label>
                        <div class="checkbox"><label><input type="checkbox" name="delta[2][vnext]" value="1"> <span class="label leak">vNext</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="delta[2][fast]" value="2"> <span class="label fast">Fast Ring</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="delta[2][slow]" value="3"> <span class="label slow">Slow Ring</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="delta[2][preview]" value="5"> <span class="label release">Release Preview</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="delta[2][pilot]" value="6"> <span class="label pilot">Semi-Annual Pilot</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="delta[2][broad]" value="7"> <span class="label broad">Semi-Annual Broad</span></label></div>
                    </div>
                    <div class="col-sm-6">
                        <label for="ring" class="control-label extra-margin">Xbox</label>
                        <div class="checkbox"><label><input type="checkbox" name="delta[3][vnext]" value="1"> <span class="label leak">vNext</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="delta[3][fast]" value="2"> <span class="label fast">Alpha Ring</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="delta[3][slow]" value="3"> <span class="label slow">Beta Ring</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="delta[3][preview]" value="4"> <span class="label preview">Ring 3</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="delta[3][release]" value="5"> <span class="label release">Ring 4</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="delta[3][pilot]" value="6"> <span class="label pilot">Production</span></label></div>
                    </div>
                    <div class="col-sm-6">
                        <label for="ring" class="control-label extra-margin">Server</label>
                        <div class="checkbox"><label><input type="checkbox" name="delta[4][vnext]" value="1"> <span class="label leak">vNext</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="delta[4][slow]" value="3"> <span class="label slow">Preview</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="delta[4][broad]" value="7"> <span class="label broad">Semi-Annual Broad</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="delta[4][ltsc]" value="8"> <span class="label ltsc">Long-Term Servicing Channel</span></label></div>
                    </div>
                    <div class="col-sm-6">
                        <label for="ring" class="control-label extra-margin">Mixed Reality</label>
                        <div class="checkbox"><label><input type="checkbox" name="delta[5][vnext]" value="1"> <span class="label leak">vNext</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="delta[5][pilot]" value="6"> <span class="label pilot">Semi-Annual Pilot</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="delta[5][broad]" value="7"> <span class="label broad">Semi-Annual Broad</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="delta[5][ltsc]" value="8"> <span class="label ltsc">Long-Term Servicing Channel</span></label></div>
                    </div>
                    <div class="col-sm-6">
                        <label for="ring" class="control-label extra-margin">IoT</label>
                        <div class="checkbox"><label><input type="checkbox" name="delta[6][vnext]" value="1"> <span class="label leak">vNext</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="delta[6][slow]" value="3"> <span class="label slow">Preview</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="delta[6][pilot]" value="6"> <span class="label pilot">Semi-Annual Pilot</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="delta[6][broad]" value="7"> <span class="label broad">Semi-Annual Broad</span></label></div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <label for="ring" class="control-label extra-margin">Team</label>
                        <div class="checkbox"><label><input type="checkbox" name="delta[7][vnext]" value="1"> <span class="label leak">vNext</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="delta[7][pilot]" value="6"> <span class="label pilot">Semi-Annual Pilot</span></label></div>
                        <div class="checkbox"><label><input type="checkbox" name="delta[7][broad]" value="7"> <span class="label broad">Semi-Annual Broad</span></label></div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fal fa-fw fa-plus"></i> Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editBuildModal" tabindex="-1" role="dialog" aria-labelledby="editBuildModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit {{ $build->id }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-fw fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                    {!! method_field('patch') !!}
                    {{ csrf_field() }}
                    <div class="col-12">
                        <div class="form-group">
                            <label for="id">Build</label>
                            <input type="number" class="form-control" id="id" name="id" aria-describedby="id" placeholder="Build" value="{{ $build->id }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="milestone">Milestone</label>
                            <input type="text" class="form-control" id="milestone" name="milestone_id" aria-describedby="milestone" placeholder="Milestone" value="{{ $build->milestone_id }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fal fa-fw fa-plus"></i> Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection