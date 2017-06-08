@extends('admin.core')

@section('content')

    <div id="list">

        If you pass an array of columns into a method that drops indexes, the conventional index name will be generated based on the table name, columns and key type:

        Schema::table('geo', function (Blueprint $table) {
        $table->dropIndex(['state']); // Drops index 'geo_state_index'
        });

        Foreign Key Constraints
        Laravel also provides support for creating foreign key constraints, which are used to force referential integrity at the database level. For example, let's define a user_id column on the posts table that references the id column on a users table:
    </div>

    @endsection