<div class="flex">
    <div class="w-full md:w-1/2">
        <table>
            <thead>
                <tr>
                    <th>Field Name</th>
                    <th>Field Type</th>
                    <th>Field Properties</th>
                    <th>Current Value</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($options as $option)
                <tr>
                    <td>{{$option->field_name}}</td>
                    <td>{{$option->field_type}}</td>
                    <td>{{$option->properties}}</td>
                    <td>{{$option->field_value}}</td>
                    <td>
                        <button type="button" wire:click='edit({{$option->id}})'>Edit</button>
                        <button type="button" wire:click='delete({{$option->id}})'>Delete</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">There are currently no fields defined. You can define some using the form below.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="w-full md:w-1/2">
        <h3 class="text-2xl font-semibold mb-3" style="line-height: 1em">@lang("Add new Field")</h3>
    </div>
</div>
