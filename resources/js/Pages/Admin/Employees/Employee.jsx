import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import PrimaryButton from "../../../Components/buttons/PrimaryButton";
import { HiPlus } from "react-icons/hi";
import { Inertia } from '@inertiajs/inertia';

export default function Employee() {
    const handleCropDone = () => {
        Inertia.get(route('create.employee'));
    };

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Employee
                </h2>
            }
        >
            <Head title="Employee" />

            <div className="py-12">
                <div className="grid gap-6">
                    <div className="bg-white rounded-lg shadow-md p-6">
                        <div className="flex justify-end mb-4">
                            <PrimaryButton onClick={handleCropDone}>
                                <HiPlus className="mr-2" /> Add Employee
                            </PrimaryButton>
                        </div>
                        <h4 className="text-lg font-semibold text-gray-800">Employee Management</h4>
                        <p className="text-sm text-gray-500">
                            DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function.
                        </p>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
