@extends('layouts.app')

@section('content')

            <x-cards-container>
                <x-ui.card :name="'New'" :count="$counts['New']" :icon="'fas fa-plus-circle text-primary'"/>
                <x-ui.card :name="'In Progress'" :count="$counts['In Progress']" :icon="'fas fa-spinner fa-spin text-warning'"/>
                <x-ui.card :name="'Pending'" :count="$counts['Pedning']" :icon="'fas fa-clock text-secondary'"/>
                <x-ui.card :name="'Completed'" :count="$counts['Completed']" :icon="'fas fa-check-circle text-success'"/>
            </x-cards-container>
            <x-ui.table :rows="$tasks"/>

@endsection
