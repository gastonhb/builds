@extends('layouts.navbar')
@section('contents')

<div class="card">
    <div class="card-header position-relative">
       {{$title}}
    </div>
    <div class="card-body">   
        <div class="row m-auto mb-2 text-start">
            <div class="col col-4">
                <label for="" class="form-label"><b>Tipo de artefacto:</b></label>
                <select id="artifactType" name="artifactType" class="form-select" onChange="changeStats()">
                    <option selected value="{{ $artifactTypeDefault->name }}">{{ $artifactTypeDefault->name }}</option>
                    @foreach($artifactTypes as $artifactType)
                        @if( $artifactTypeDefault->id <> $artifactType->id)
                            <option value="{{ $artifactType->name }}" @selected(old('artifactType') == $artifactTypeDefault)>{{ $artifactType->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col col-4">
                <label for="" class="form-label"><b>Estadística:</b></label>
                <select id="stat" name="stat" class="form-select">
                    
                        <option selected value="{{ $sandsDefault->id }}">{{ $sandsDefault->name }}</option>
                        @foreach($sandsStats as $sands)
                            @if( $sandsDefault->id <> $sands->id)
                                <option value="{{ $sands->id }}" @selected(old('sands') == $sandsDefault)>{{ $sands->name }}</option>
                            @endif
                        @endforeach
                    
                </select>
            </div>
            <div class="col col-4">
                <label for="" class="form-label"><b>Set:</b></label>
                <select id="set" name="set" class="form-select">
                    <option selected disabled>Seleccione un set</option>
                    @foreach($sets as $set)
                        <option value="{{ $set->id }}">{{ $set->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row m-auto mb-2">
            <label><b>Subestadísticas:</b></label>
        </div>

        <div class="row m-auto mb-2">
            @foreach($substats as $substat)
                <div class="col col-3 col-md-2 col-lg-1 col-xl-1 form-check form-check-inline m-auto mb-2">
                    <input class="form-check-input" type="checkbox" id="{{'checkSubstat' . $substat->name}}" name="{{'checkSubstat' . $substat->name}}">
                    <label class="form-check-label" for="{{$substat->name}}">
                        {{$substat->name}}
                    </label>
                </div>
            @endforeach
        </div>

        <div class="row m-auto mb-2 d-flex justify-content-end">
            <div class="col col-2">
                <div class="btn btn-primary" onClick="search()">Buscar</div>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col" style="width:20%">Personaje</th>
                    <th scope="col" style="width:30%">Set</th>
                    <th scope="col" style="width:40%">Subestadísticas</th>
                    <th scope="col" style="width:10%">Cantidad</th>
                </tr>
            </thead>
            <tbody id="table" name="table">
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('js')
    <script>
        function changeStats()
        {
            let artifactTypeSelect = document.getElementById("artifactType").value;
            let statSelect = document.getElementById("stat");
            $.ajax({
                type:'GET',
                url:'/artifact-types/stats?name=' + artifactTypeSelect,
                success:function(data) {
                    $("#stat").html(data);
                    data.stats.forEach(artifactType => {
                        let option = document.createElement("option");
                        option.text = artifactType.name;
                        option.value = artifactType.id;
                        statSelect.add(option);
                    }); 
                }
            });
        }

        function search()
        {
            let artifactTypeSelect = document.getElementById("artifactType").value;
            let statSelect = document.getElementById("stat").value;
            let setSelect = document.getElementById("set").value;
            let table = document.getElementById("table");
            $("#table tr").remove(); 
            $.ajax({
                type:'GET',
                url:'/check-artifacts/search?artifactType=' + artifactTypeSelect + '&set=' + setSelect + '&stat=' + statSelect,
                success:function(data) {
                    data.builds.forEach(build => {
                        let substatCount = 0;
                        if (build[data.artifactType] != null) {
                            let row = document.createElement("tr");

                            let characterTd = document.createElement("td");
                            let setTd = document.createElement("td");
                            let substatsTd = document.createElement("td");
                            let countTd = document.createElement("td");

                            characterTd.appendChild(document.createTextNode(build.character.name));
                            setTd.appendChild(document.createTextNode(build.set.name));
                            build.substats.forEach(buildSubstat => {
                                substatsTd.appendChild(document.createTextNode(buildSubstat.substat.name + " "));    
                                let substat = document.getElementById("checkSubstat" + buildSubstat.substat.name).checked;
                                if (substat) {
                                    let table = document.getElementById("table");
                                    substatCount++;
                                }
                            });
                            countTd.appendChild(document.createTextNode(substatCount));

                            row.appendChild(characterTd);
                            row.appendChild(setTd);
                            row.appendChild(substatsTd);
                            row.appendChild(countTd);


                            table.appendChild(row);
                        }        
                    })
                    sortTable(table);
                }
            });        
        }

        function sortTable(table) {
            var rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("table");
            switching = true;
            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 0; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[3];
                    y = rows[i + 1].getElementsByTagName("TD")[3];

                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }
    </script>
@endsection