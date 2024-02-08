@extends('layouts.app', [
    'pageTitle' => __('Developer Stats'),
])

<?php
// TODO: finish refactoring - either merge with users, or even better, create a "creator portal" tailored for achievements creators
?>

@section('main')
    <x-section>
        <div class='component'>
            <h3>Developers</h3>
            @if(count($devData))
                <?php
                $tableType = ($type == 2) ? "Unlocks" : (($type == 1) ? "Points Allocated" : "Achievements Created");
                ?>
                <div class="table-responsive">
                    <table class="table table-sm table-striped">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Developer</th>
                            <th>{{ $tableType }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @for( $i = 0; $i < count( $devData ); $i++ )
                            <?php
                            // $nextData = $devData[$i];
                            $numAchievements = $nextData['NumCreated'];
                            ?>
                            <tr>
                                <td>
                                    <x-user.avatar :user="$user" display="icon" />
                                </td>
                                <td class="w-full">
                                    <x-user.avatar :user="$user" />
                                </td>
                                <td class="text-right">{{ $numAchievements }}</td>
                            </tr>
                        @endfor
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </x-section>
@endsection
