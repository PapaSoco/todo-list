<x-app-layout>
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">

                <div class="panel-body">
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}


                            <label for="name" class="block text-sm font-medium leading-6 text-gray-900 font-sans text-xl">Новая задача</label>
                            <div class="w-52 inline-block mt-2 rounded-md shadow-sm">
                                <input type="text" name="name" id="task-name" class=" w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    placeholder="{{old("task")}}" value="{{old('task')}}">
                                <button type="submit" class="w-22 transition-colors ease-in-out bg-green-500 hover:bg-green-700 text-white shadow-sm">
                                    <i class="fa fa-btn fa-plus"></i>Добавить
                                </button>
                            </div>

                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($tasks) > 0)
                <ul role="list" class="px-4 divide-y divide-gray-400">
                    <p class="font-sans text-2xl"> Текущие задачи</p>
                    @foreach ($tasks as $task)
                        <li class="w-52 flex justify-between gap-x-6 py-5 bg-slate-100">
                            <div class="flex min-w-0 gap-x-4">
                                <div class="min-w-0 flex-auto">
                                    <p class="font-semibold leading-6 text-gray-900">{{$task->name}}</p>
                                </div>
                            </div>
                            <div class="hidden shrink-0 w-32 md:flex sm:flex-col sm:items-end">
                                <form action="{{ url('task/' . $task->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" id="delete-task-{{ $task->id }}" class=" transition-colors ease-in-out bg-red-500 hover:scale-140 hover:bg-red-800 text-white shadow">
                                        <i class="fa fa-btn fa-trash"></i>Удалить
                                    </button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</x-app-layout>