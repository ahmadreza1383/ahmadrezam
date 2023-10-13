@extends('layouts.app')
@section('head')
    <style>
        .seed{
            width: 30px;
            height: 30px;
            padding: 5px;
            border-radius: 100%;
            margin: 10px;
            border: solid 1px darkorange;
            display: inline-block;
            text-align: center;
            color: darkorange;
        }

        .tick-seed{
            background: darkorange;
            color: white;
        }

        .mount{
            margin: 10px;
            width:max-content;
            border:solid 2px darkorange;
            padding: 10px;
        }

        .mount-title{
            color: darkorange;
        }

    </style>
@endsection
@section('main')
<!-- About-->
    <li class="list-group-item active">programming learning</li>

    <div class="container chain">
        <div class="row">
            <div class="mount col-4">
                @foreach ($listOfDaysPerYear as $listOfDaysPerMount)
                    <div class="mount-title">Shahrivar</div>
                        @foreach ($listOfDaysPerMount as $DatePerDay)
                            <div class="seed tick-seed">{{$DatePerDay}}</div>
                        @endforeach
                    </div>
                @endforeach
                {{-- <div class="row">
                    <div class="seed tick-seed">1</div>
                    <div class="seed tick-seed">2</div>
                    <div class="seed tick-seed">3</div>
                    <div class="seed tick-seed">4</div>
                    <div class="seed tick-seed">5</div>
                    <div class="seed tick-seed">6</div>
                    <div class="seed tick-seed">7</div>
                    <div class="seed tick-seed">8</div>
                    <div class="seed">9</div>
                    <div class="seed">10</div>
                    <div class="seed">11</div>
                    <div class="seed">12</div>
                    <div class="seed">13</div>
                    <div class="seed">14</div>
                    <div class="seed">15</div>
                    <div class="seed">16</div>
                    <div class="seed">17</div>
                    <div class="seed">18</div>
                    <div class="seed">19</div>
                    <div class="seed">20</div>
                    <div class="seed">21</div>
                    <div class="seed">22</div>
                    <div class="seed">23</div>
                    <div class="seed">24</div>
                    <div class="seed">25</div>
                    <div class="seed">26</div>
                    <div class="seed">27</div>
                    <div class="seed">28</div>
                    <div class="seed">29</div>
                    <div class="seed">30</div>
                    <div class="seed">31</div>
                </div> --}}
            </div>

            {{-- <div class="mount col-4">
                <div class="mount-title">Mehr</div>
                <div class="row">
                    <div class="seed tick-seed">1</div>
                    <div class="seed tick-seed">2</div>
                    <div class="seed tick-seed">3</div>
                    <div class="seed tick-seed">4</div>
                    <div class="seed tick-seed">5</div>
                    <div class="seed tick-seed">6</div>
                    <div class="seed tick-seed">7</div>
                    <div class="seed tick-seed">8</div>
                    <div class="seed">9</div>
                    <div class="seed">10</div>
                </div>
                <div class="row">
                    <div class="seed">11</div>
                    <div class="seed">12</div>
                    <div class="seed">13</div>
                    <div class="seed">14</div>
                    <div class="seed">15</div>
                    <div class="seed">16</div>
                    <div class="seed">17</div>
                    <div class="seed">18</div>
                    <div class="seed">19</div>
                    <div class="seed">20</div>
                </div>
                <div class="row">
                    <div class="seed">21</div>
                    <div class="seed">22</div>
                    <div class="seed">23</div>
                    <div class="seed">24</div>
                    <div class="seed">25</div>
                    <div class="seed">26</div>
                    <div class="seed">27</div>
                    <div class="seed">28</div>
                    <div class="seed">29</div>
                    <div class="seed">30</div>
                </div>
                <div class="row">
                    <div class="seed">31</div>
                </div>
            </div>

            <div class="mount col-4">
                <div class="mount-title">Aban</div>
                <div class="row">
                    <div class="seed tick-seed">1</div>
                    <div class="seed tick-seed">2</div>
                    <div class="seed tick-seed">3</div>
                    <div class="seed tick-seed">4</div>
                    <div class="seed tick-seed">5</div>
                    <div class="seed tick-seed">6</div>
                    <div class="seed tick-seed">7</div>
                    <div class="seed tick-seed">8</div>
                    <div class="seed">9</div>
                    <div class="seed">10</div>
                </div>
                <div class="row">
                    <div class="seed">11</div>
                    <div class="seed">12</div>
                    <div class="seed">13</div>
                    <div class="seed">14</div>
                    <div class="seed">15</div>
                    <div class="seed">16</div>
                    <div class="seed">17</div>
                    <div class="seed">18</div>
                    <div class="seed">19</div>
                    <div class="seed">20</div>
                </div>
                <div class="row">
                    <div class="seed">21</div>
                    <div class="seed">22</div>
                    <div class="seed">23</div>
                    <div class="seed">24</div>
                    <div class="seed">25</div>
                    <div class="seed">26</div>
                    <div class="seed">27</div>
                    <div class="seed">28</div>
                    <div class="seed">29</div>
                    <div class="seed">30</div>
                </div>
                <div class="row">
                    <div class="seed">31</div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection

