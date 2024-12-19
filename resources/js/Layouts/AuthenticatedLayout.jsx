import Header from '@/Components/Header';
import { Link, usePage } from '@inertiajs/react';
import React, { useState } from 'react';
import { HiMenuAlt3 } from "react-icons/hi";
import { RiHomeWifiLine } from "react-icons/ri";

export default function AuthenticatedLayout({ header, children }) {
    const user = usePage().props.auth.user;
    const [showingNavigationDropdown, setShowingNavigationDropdown] = useState(false);

    const menus = [
        {name: "Dashboard", link: '/', icon: RiHomeWifiLine },
        {name: "Dashboard", link: '/', icon: RiHomeWifiLine },
        {name: "Dashboard", link: '/', icon: RiHomeWifiLine },
        {name: "Dashboard", link: '/', icon: RiHomeWifiLine, margin: true },
        {name: "Dashboard", link: '/', icon: RiHomeWifiLine },
        {name: "Dashboard", link: '/', icon: RiHomeWifiLine },
    ]

    const [open, setOpen] = useState(true);

    return (
        <section className="flex gap-1">
            <div className={`bg-[#0e0e0e] min-h-screen ${open ? 'w-72':'w-16'} duration-500 text-gray-100 px-4`}>
                <div className='py-3 flex justify-end'>
                    <HiMenuAlt3 size={26} className="cursor-pointer" onClick={() => setOpen(!open)}/>
                </div>
                <div className='mt-4 flex flex-col gap-4 relative'>
                    {
                        menus?.map((menu, i) => (
                            <Link to={menu?.link} key={i} className={`${menu?.margin && "mt-5"} group flex items-center text-sm gap-3.5 font-medium p-2 hover:bg-gray-800 rounded-md`}>
                                <div>{React.createElement(menu?.icon, {size: "20" })}</div>
                                <h2 style={{ transitionDelay: `${i + 3}00ms` }} className={`whitespace-pre duration-500 ${!open && 'opacity-0 translate-x-28 overflow-hidden'}`}>
                                    {menu?.name}
                                </h2>
                                <h2 className={`${open && 'hidden'} absolute left-48 bg-white font-semibold whitespace-pre text-gray-900 rounded-md drop-shadow-lg px-0 py-0 w-0 overflow-hidden group-hover:px-2 group-hover:py-1 group-hover:left-14 group-hover:duration-300 group-hover:w-fit`}>{menu?.name}</h2>
                            </Link>
                        ))
                    }
                </div>
            </div>
            <div className='m-3 text-xl text-gray-900 font-semibold w-full'>
                <Header />

                <main>{children}</main>
            </div>
        </section>
    );
}
