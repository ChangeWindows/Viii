@extends('layouts.backstage')

@section('jumbotron')
<h1>Edit {{ $milestone->name }} version {{ $milestone->version }}</h1>
@endsection

@section('content')
<div class="col-md-12">
    <form method="POST" action="{{ route('patchMilestone') }}" class="row row-p-10">
        {!! method_field('patch') !!}
        {{ csrf_field() }}
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <label for="id">Id</label>
                <input type="text" class="form-control" id="id" name="id" aria-describedby="id" placeholder="Id" value="{{ $milestone->id }}">
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <label for="os">OS name</label>
                <input type="text" class="form-control" id="os" name="os" aria-describedby="os" placeholder="OS name" value="{{ $milestone->os }}">
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Name" value="{{ $milestone->name }}">
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <label for="codename">Codename</label>
                <input type="text" class="form-control" id="codename" name="codename" aria-describedby="codename" placeholder="Codename" value="{{ $milestone->codename }}">
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <label for="version">Version</label>
                <input type="number" class="form-control" id="version" name="version" aria-describedby="version" placeholder="Version" value="{{ $milestone->version }}">
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <label for="color">Color</label>
                <input type="text" class="form-control" id="color" name="color" aria-describedby="color" placeholder="Color" value="{{ $milestone->color }}">
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <label for="preview">Preview</label>
                <input type="date" class="form-control" id="preview" name="preview" aria-describedby="preview" placeholder="Preview" value="{{ $milestone->preview }}">
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <label for="release">Release</label>
                <input type="date" class="form-control" id="release" name="release" aria-describedby="release" placeholder="Release" value="{{ $milestone->release }}">
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <label for="extension">Extension</label>
                <input type="date" class="form-control" id="extension" name="extension" aria-describedby="extension" placeholder="Extension" value="{{ $milestone->extension }}">
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <label for="mainstream">Mainstream</label>
                <input type="date" class="form-control" id="mainstream" name="mainstream" aria-describedby="mainstream" placeholder="Mainstream" value="{{ $milestone->mainstream }}">
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <label for="extended">Extended</label>
                <input type="date" class="form-control" id="extended" name="extended" aria-describedby="extended" placeholder="Extended" value="{{ $milestone->extended }}">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" aria-describedby="description" placeholder="Description">{{ $milestone->description }}</textarea>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
            <h4>PC</h4>
            <div class="form-group">
                <label for="pc_next">Next</label>
                <select class="form-control" id="pc_next" name="pc_next" aria-describedby="pc_next">
                    <option value="0" {{ $milestone->pc_next == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->pc_next == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->pc_next == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="pc_fast">Fast</label>
                <select class="form-control" id="pc_fast" name="pc_fast" aria-describedby="pc_fast">
                    <option value="0" {{ $milestone->pc_fast == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->pc_fast == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->pc_fast == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="pc_slow">Slow</label>
                <select class="form-control" id="pc_slow" name="pc_slow" aria-describedby="pc_slow">
                    <option value="0" {{ $milestone->pc_slow == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->pc_slow == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->pc_slow == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="pc_release">Release Preview</label>
                <select class="form-control" id="pc_release" name="pc_release" aria-describedby="pc_release">
                    <option value="0" {{ $milestone->pc_release == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->pc_release == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->pc_release == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="pc_targeted">Semi-Annual Channel Targeted</label>
                <select class="form-control" id="pc_targeted" name="pc_targeted" aria-describedby="pc_targeted">
                    <option value="0" {{ $milestone->pc_targeted == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->pc_targeted == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->pc_targeted == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="pc_broad">Semi-Annual Channel Broad</label>
                <select class="form-control" id="pc_broad" name="pc_broad" aria-describedby="pc_broad">
                    <option value="0" {{ $milestone->pc_broad == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->pc_broad == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->pc_broad == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="pc_lts">Long-Term Servicing Channel</label>
                <select class="form-control" id="pc_lts" name="pc_lts" aria-describedby="pc_lts">
                    <option value="0" {{ $milestone->pc_lts == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->pc_lts == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->pc_lts == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
            <h4>Mobile</h4>
            <div class="form-group">
                <label for="mobile_next">Next</label>
                <select class="form-control" id="mobile_next" name="mobile_next" aria-describedby="mobile_next">
                    <option value="0" {{ $milestone->mobile_next == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->mobile_next == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->mobile_next == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="mobile_fast">Fast</label>
                <select class="form-control" id="mobile_fast" name="mobile_fast" aria-describedby="mobile_fast">
                    <option value="0" {{ $milestone->mobile_fast == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->mobile_fast == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->mobile_fast == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="mobile_slow">Slow</label>
                <select class="form-control" id="mobile_slow" name="mobile_slow" aria-describedby="mobile_slow">
                    <option value="0" {{ $milestone->mobile_slow == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->mobile_slow == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->mobile_slow == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="mobile_release">Release Preview</label>
                <select class="form-control" id="mobile_release" name="mobile_release" aria-describedby="mobile_release">
                    <option value="0" {{ $milestone->mobile_release == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->mobile_release == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->mobile_release == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="mobile_targeted">Semi-Annual Channel Targeted</label>
                <select class="form-control" id="mobile_targeted" name="mobile_targeted" aria-describedby="mobile_targeted">
                    <option value="0" {{ $milestone->mobile_targeted == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->mobile_targeted == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->mobile_targeted == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="mobile_broad">Semi-Annual Channel Broad</label>
                <select class="form-control" id="mobile_broad" name="mobile_broad" aria-describedby="mobile_broad">
                    <option value="0" {{ $milestone->mobile_broad == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->mobile_broad == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->mobile_broad == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
            <h4>Xbox</h4>
            <div class="form-group">
                <label for="xbox_next">Next</label>
                <select class="form-control" id="xbox_next" name="xbox_next" aria-describedby="xbox_next">
                    <option value="0" {{ $milestone->xbox_next == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->xbox_next == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->xbox_next == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="xbox_fast">Alpha</label>
                <select class="form-control" id="xbox_fast" name="xbox_fast" aria-describedby="xbox_fast">
                    <option value="0" {{ $milestone->xbox_fast == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->xbox_fast == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->xbox_fast == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="xbox_slow">Beta</label>
                <select class="form-control" id="xbox_slow" name="xbox_slow" aria-describedby="xbox_slow">
                    <option value="0" {{ $milestone->xbox_slow == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->xbox_slow == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->xbox_slow == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="xbox_release">Delta</label>
                <select class="form-control" id="xbox_release" name="xbox_release" aria-describedby="xbox_release">
                    <option value="0" {{ $milestone->xbox_release == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->xbox_release == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->xbox_release == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="xbox_release">Omega</label>
                <select class="form-control" id="xbox_release" name="xbox_release" aria-describedby="xbox_release">
                    <option value="0" {{ $milestone->xbox_release == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->xbox_release == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->xbox_release == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="xbox_targeted">Production</label>
                <select class="form-control" id="xbox_targeted" name="xbox_targeted" aria-describedby="xbox_targeted">
                    <option value="0" {{ $milestone->xbox_targeted == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->xbox_targeted == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->xbox_targeted == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
            <h4>Server</h4>
            <div class="form-group">
                <label for="server_next">Next</label>
                <select class="form-control" id="server_next" name="server_next" aria-describedby="server_next">
                    <option value="0" {{ $milestone->server_next == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->server_next == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->server_next == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="server_slow">Preview</label>
                <select class="form-control" id="server_slow" name="server_slow" aria-describedby="server_slow">
                    <option value="0" {{ $milestone->server_slow == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->server_slow == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->server_slow == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="server_targeted">Semi-Annual Channel Targeted</label>
                <select class="form-control" id="server_targeted" name="server_targeted" aria-describedby="server_targeted">
                    <option value="0" {{ $milestone->server_targeted == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->server_targeted == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->server_targeted == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="server_broad">Semi-Annual Channel Broad</label>
                <select class="form-control" id="server_broad" name="server_broad" aria-describedby="server_broad">
                    <option value="0" {{ $milestone->server_broad == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->server_broad == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->server_broad == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="server_lts">Long-Term Servicing Channel</label>
                <select class="form-control" id="server_lts" name="server_lts" aria-describedby="server_lts">
                    <option value="0" {{ $milestone->server_lts == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->server_lts == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->server_lts == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
            <h4>IoT</h4>
            <div class="form-group">
                <label for="iot_next">Next</label>
                <select class="form-control" id="iot_next" name="iot_next" aria-describedby="iot_next">
                    <option value="0" {{ $milestone->iot_next == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->iot_next == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->iot_next == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="iot_slow">Slow</label>
                <select class="form-control" id="iot_slow" name="iot_slow" aria-describedby="iot_slow">
                    <option value="0" {{ $milestone->iot_slow == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->iot_slow == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->iot_slow == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="iot_targeted">Semi-Annual Channel Targeted</label>
                <select class="form-control" id="iot_targeted" name="iot_targeted" aria-describedby="iot_targeted">
                    <option value="0" {{ $milestone->iot_targeted == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->iot_targeted == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->iot_targeted == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="iot_broad">Semi-Annual Channel Broad</label>
                <select class="form-control" id="iot_broad" name="iot_broad" aria-describedby="iot_broad">
                    <option value="0" {{ $milestone->iot_broad == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->iot_broad == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->iot_broad == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
            <h4>Hologrpahic</h4>
            <div class="form-group">
                <label for="holographic_next">Next</label>
                <select class="form-control" id="holographic_next" name="holographic_next" aria-describedby="holographic_next">
                    <option value="0" {{ $milestone->holographic_next == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->holographic_next == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->holographic_next == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="holographic_slow">Preview</label>
                <select class="form-control" id="holographic_slow" name="holographic_slow" aria-describedby="holographic_slow">
                    <option value="0" {{ $milestone->holographic_slow == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->holographic_slow == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->holographic_slow == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="holographic_targeted">Semi-Annual Channel Targeted</label>
                <select class="form-control" id="holographic_targeted" name="holographic_targeted" aria-describedby="holographic_targeted">
                    <option value="0" {{ $milestone->holographic_targeted == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->holographic_targeted == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->holographic_targeted == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="holographic_broad">Semi-Annual Channel Broad</label>
                <select class="form-control" id="holographic_broad" name="holographic_broad" aria-describedby="holographic_broad">
                    <option value="0" {{ $milestone->holographic_broad == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->holographic_broad == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->holographic_broad == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="holographic_lts">Long-Term Servicing Channel</label>
                <select class="form-control" id="holographic_lts" name="holographic_lts" aria-describedby="holographic_lts">
                    <option value="0" {{ $milestone->holographic_lts == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->holographic_lts == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->holographic_lts == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
            <h4>Team</h4>
            <div class="form-group">
                <label for="team_next">Next</label>
                <select class="form-control" id="team_next" name="team_next" aria-describedby="team_next">
                    <option value="0" {{ $milestone->team_next == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->team_next == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->team_next == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="team_slow">Preview</label>
                <select class="form-control" id="team_slow" name="team_slow" aria-describedby="team_slow">
                    <option value="0" {{ $milestone->team_slow == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->team_slow == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->team_slow == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="team_targeted">Semi-Annual Channel Targeted</label>
                <select class="form-control" id="team_targeted" name="team_targeted" aria-describedby="team_targeted">
                    <option value="0" {{ $milestone->team_targeted == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->team_targeted == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->team_targeted == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
                <label for="team_broad">Semi-Annual Channel Broad</label>
                <select class="form-control" id="team_broad" name="team_broad" aria-describedby="team_broad">
                    <option value="0" {{ $milestone->team_broad == 0 ? 'selected' : '' }}>None</option>
                    <option value="1" {{ $milestone->team_broad == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $milestone->team_broad == 2 ? 'selected' : '' }}>Deprecated</option>
                </select>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary"><i class="fal fa-fw fa-check"></i> Save</button>
        </div>
    </form>
</div>
@endsection