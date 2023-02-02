<template>
    <Layout>
        <main>
            <div class="dashboard">
                <div class="header">
                    <!-- @if($Player != null)
                        <h1>Welcome, {{ $Player->name }}</h1>
                    @else
                        <h1>Welcome, Lara</h1>
                    @endif -->
                    <h1>Hello, {{ Player }}</h1>
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
                                <!-- {{-- @foreach($user->items as $item)
                                    <li>{{ $item->name }} ({{ $item->quantity }})</li>
                                @endforeach --}} -->
                            </ul>
                        </div>
                        <!--Quests -->
                        <div class="card">
                            <h2>Quests</h2>
                            <ul>
                                <li 
                                v-for="user in users"
                                    :key="user.id"
                                    v-text="user.name"
                                />
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
                                <!-- {{-- @foreach($user->items as $item)
                                    <li>{{ $item->name }} ({{ $item->quantity }})</li>
                                @endforeach --}} -->
                            </ul>
                        </div>
                    </section>

                    <!--Graphs -->
                    <section  class="graph">
                        <div class="card">
                            <Chart/>
                        </div>
                        <!-- <modal-box :show-modal="showModal" :info="'Add Weight'"></modal-box>
                        <modal-box :show-modal="showModal" :info="'Add Workout'"></modal-box>
                        <modal-box :show-modal="showModal" :info="'Add Food'"></modal-box> -->
                    </section>
                </div>
            </div>
        </main>  
    </Layout>  
</template>

<script>
import Layout from '../Shared/Layout'
import Chart from '../components/RadarChart'

    export default {
        props: {
            Player: String,
            users: Array,
        },
        components: {
            Layout,
        }
    };
</script>

<style scoped>
.dashboard {
    max-width: 800px;
    margin: 6% auto;
    /* background-color: #34495e; */
    background-color: #2a1d0d;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0,0,0,0.5);
}

.header {
    text-align: center;
    margin-bottom: 20px;
}

.header h1 {
    font-size: 40px;
    margin: 0;
}

.content {
    display: flex;
    flex-wrap: wrap;
}

.card {
    flex: 1;
    margin: 10px;
    padding: 20px;
    /* background-color: #fff; */
    background-color: #9a9a8e;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0,0,0,0.5);
    text-align: center;
    color: #45230d;
}

.card h2 {
    margin: 0;
}

section {
    width: 100%;
    display: flex; /* This will align the cards horizontally and with space between them */
}

ul {
    list-style: none;
    text-align: center;
    padding: 0%;
}

.graph{
    width: 50%;
}

.circle-button {
    width: 50px;
    height: 50px;
    border-radius: 25px; /* make the button circular */
    background-color: #276468;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
}


</style>
