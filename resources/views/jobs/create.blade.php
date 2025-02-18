<x-layout>
    <x-page-heading>New Job</x-page-heading>

    <x-forms.form method="POST" action="/jobs">
        <x-forms.input label="Title" name="title" placeholder="Warrior" />
        <x-forms.input label="Salary" name="salary" placeholder="30,000 Gil"/>
        <x-forms.input label="Location" name="location" placeholder="Eastern La Noscea"/>

        <x-forms.select label="Schedule" name="schedule">
            <option>Part Time</option>
            <option>Full Time</option>
        </x-forms.select>   

        <x-forms.input label="URL" name="url" placeholder="https://maelstrom.com/jobs/warrior-wanted"/>
        <x-forms.checkbox label="Feature (Costs Extra)" name="featured" />

        <x-forms.divider />

        <x-forms.input label="Tags (comma separated)" name="tags" placeholder="tank, axe, blue"/>

        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>
</x-layout>