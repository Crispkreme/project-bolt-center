import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import { IoMdAperture } from "react-icons/io";
import DashboardCard from '@/Components/Cards/DashboardCard';
// import { toast } from 'react-hot-toast';

export default function Dashboard() {
    // const { flash } = usePage().props;
    
    // useEffect(() => {
    //     if (flash?.message?.success) {
    //         console.log("success");
    //         toast.success("Profile updated successfully!");
    //     }
    //     if (flash?.message?.error) {
    //         console.log("error");
    //         toast.error("Please try again");
    //     }
    // }, [flash]);

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Dashboard
                </h2>
            }
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                    
                    <DashboardCard
                        icon={IoMdAperture}
                        price="12,145"
                        description="Income status"
                        progressColor="bg-blue-500"
                        progress={60}
                        percentage="Target"
                        target="Target"
                    />
                    <DashboardCard
                        icon={IoMdAperture}
                        price="12,145"
                        description="Income status"
                        progressColor="bg-green-500"
                        progress={60}
                        percentage="Target"
                        target="Target"
                    />
                    <DashboardCard
                        icon={IoMdAperture}
                        price="12,145"
                        description="Income status"
                        progressColor="bg-yellow-500"
                        progress={60}
                        percentage="Target"
                        target="Target"
                    />
                    <DashboardCard
                        icon={IoMdAperture}
                        price="12,145"
                        description="Income status"
                        progressColor="bg-red-500"
                        progress={60}
                        percentage="Target"
                        target="Target"
                    />

                </div>
            </div>

        </AuthenticatedLayout>
    );
}
