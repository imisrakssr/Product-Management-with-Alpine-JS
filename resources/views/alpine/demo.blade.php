<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://matcha.mizu.sh/matcha.css">
    <title>Alpine Js</title>
    {{-- @vite(['resourses/js/app.js']) --}}
</head>
<body>
    <h1>Advance JavaScript</h1>
    <h2>{{ $title }}</h2>

{{-- <div class=demo1>
    <div x-data="{ open: false }">
        <button @click="open = true">Expand</button>
        <span x-show="open">
            Content...
        </span>
    </div>

    <div x-data="data">

        <h1 x-text="message"></h1>
        <p x-text="date"></p>

        <button @click="date='Dec 12'" class="click">Click Me</button>

    </div>

    <script>
        const data = {
            message: 'Hello World',
            date: 'Nov 21'
        }
    </script>

</div> --}}

{{-- <div class=demo2>

    <div x-data="data">

        <button @click="open=false" class="click">Hide</button>
        <button @click="open=true" class="click">Show</button>
        <button @click="open=!open" class="click">Toggle</button>

        <div x-show="open" x-transition style="height: 200px; width:500px; background-color:rgb(0, 0, 0); padding:10px;">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis quia sequi placeat facere vel quidem recusandae, quod velit earum explicabo exercitationem vero in et laudantium officiis consequuntur ducimus dolore molestias?
        </div>

    </div>

    <script>
        const data = {
            open:false
        }
    </script>

</div> --}}

{{-- <div class=demo3>

    <div x-data="person">
        <p x-text="name"></p>
        <p x-text="age"></p>
        <p x-text="email"></p>
        <p x-text="phone"></p>
        <hr>

        <input type="text" x-model="name"><br>
        <input type="text" x-model="age"><br>
        <input type="text" x-model="email"><br>
        <input type="text" x-model="phone"><br>

    </div>

    <script>
        const person = {
            name:'Israk',
            age: 30,
            email:'israk@gmail.com',
            phone:'017xx xxx xxx'
        }
    </script>

</div> --}}

{{-- <div class=demo4>

    <div x-data="data">

        <ul>
            <template x-for="person in persons" :key="person.email">

                <li x-text='person.name'></li>
            </template>
        </ul>

    </div>

    <script>
        const data = {
            persons:[
                {name:'israk', age:30, email:'israk@gmail.com',phone:'017xx xxx xxx'},
                {name:'sisir', age:20, email:'sisir@gmail.com',phone:'017xx yyy xxx'},
                {name:'new', age:18, email:'new@gmail.com',phone:'019xx xxx xyy'}
            ]
        }
    </script>

</div> --}}

</body>

<script src="//unpkg.com/alpinejs" defer></script>

</html>
