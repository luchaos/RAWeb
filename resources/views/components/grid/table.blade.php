<div class="table-responsive">
    <table class="table table-sm table-condensed table-hover">
        <thead>
        <tr>
            @foreach($columns as $column)
                <x-grid.table-head :column="$column" :results="$results" />
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach($results as $model)
            @includeFirst(['components.'.$resource.'.table-row', 'components.resource.table-row'], ['model' => $model])
        @endforeach
        </tbody>
    </table>
</div>
