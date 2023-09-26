@props(['colspan'])
<tr>
    <td colspan="{{$colspan}}">
        <div class="flex justify-center items-center mt-10">
            <x-icons.info class="w-4 h-4 mr-2 text-blue-500"/> {{ __('No entries found') }}
        </div>
    </td>
</tr>
