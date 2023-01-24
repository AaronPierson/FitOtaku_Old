<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="css/dashboard.css"
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body class="antialiased" id="app">
            <div class="dashboard">
                <div class="header">
                    <h1>Welcome, Lara</h1>
                </div>
                <div class="content">
                    <button @click="showModal = !showModal" class="circle-button">Open modal</button>
                    <!--Stats -->
                    <section>
                        <div class="card">
                            <h2>Level: 4</h2>
                            <p>Experience: 194/200</p>
                            <p>Class: Rouge</p>
                        </div>
                        <!--Inventory -->
                        <div class="card">
                            <h2>Inventory</h2>
                            <ul>
                                {{-- @foreach($user->items as $item)
                                    <li>{{ $item->name }} ({{ $item->quantity }})</li>
                                @endforeach --}}
                            </ul>
                        </div>
                        <!--Quests -->
                        <div class="card">
                            <h2>Quests</h2>
                            <ul>
                                {{-- @foreach($user->quests as $quest)
                                    <li>{{ $quest->name }} - {{ $quest->status }}</li>
                                @endforeach --}}
                            </ul>
                        </div>
                    </section>

                    <!--Stats -->
                    <section class="Abilities">
                        <div class="card">
                            <h2>Attributes</h2>
                            <ul>
                                <li>Strength: 10</li>
                                <li>Willpower: 10</li>
                                <li>Agility: 10</li>
                                <li>Endurance: 10</li>
                                <li>Personality: 10</li>
                                <li>Luck: 10</li>
                            </ul>
                        </div>
                        <!--Skills -->
                        <div class="card">
                            <h2>Skills</h2>
                            <ul>
                                {{-- @foreach($user->items as $item)
                                    <li>{{ $item->name }} ({{ $item->quantity }})</li>
                                @endforeach --}}
                            </ul>
                        </div>
                    </section>

                    <!--Graphs -->
                    <section  class="graph">
                        <div class="card">
                            <chart-grid/>
                        </div>
                        <modal-box :show-modal="showModal" :info="'Add Weight'"></modal-box>
                        <modal-box :show-modal="showModal" :info="'Add Workout'"></modal-box>
                        <modal-box :show-modal="showModal" :info="'Add Food'"></modal-box>
                    </section>
                </div>
            </div>
        <script src="{{ mix('js/app.js') }}" defer></script>
    </body>
</html>
