import * as Icon from '@phosphor-icons/react/dist/ssr'
import Link from 'next/link'

import { useSelector } from 'react-redux'
import Loader from '@/components/Loader/Loader';

const NavTop = () => {
    const { data: settings, loading } = useSelector((state) => state.setting)
    if(loading) return <Loader />

    return (
        <div className='bg-slate-600'>
            <div className='container flex items-center justify-between h-[44px]'>
                <div className='left-block flex items-center'>
                    <div className='location flex items-center max-lg:hidden'>
                        <Icon.MapPin className='text-white text-xl' />
                        <span className='ml-2 caption1 text-white'>{settings?.site_address}</span> 
                    </div>

                    <div className='mail lg:ml-7 flex items-center'>
                        <Icon.Envelope className='text-white text-xl'/>
                        <span className='ml-2 caption1 text-white'>{settings?.site_email}</span>  
                    </div> 
                </div>

                <div className='right-block flex items-center gap-5'>
                    <div className='line h-6 w-px bg-grey max-sm:hidden'></div>
                    <div className='list-social flex items-center gap-2.5 max-sm:hidden'>
                        <Link className='item rounded-full w-7 h-7 border-grey border-2 flex items-center justify-center' href={settings?.link_facebook} target='_blank' >
                            <i className='icon-facebook text-sm'></i> 
                        </Link>
                        <Link className='item rounded-full w-7 h-7 border-grey border-2 flex items-center justify-center' href={settings?.link_linkedin}target='_blank' >
                            <i className='icon-in text-[10px]'></i> 
                        </Link>
                        <Link className='item rounded-full w-7 h-7 border-grey border-2 flex items-center justify-center' href={settings?.link_twitter} target='_blank' >
                            <i className='icon-twitter text-[10px]'></i> 
                        </Link>
                        <Link className='item rounded-full w-7 h-7 border-grey border-2 flex items-center justify-center' href={settings?.link_instagram} target='_blank' >
                            <i className='icon-insta text-[10px]'></i> 
                        </Link>
                        <Link className='item rounded-full w-7 h-7 border-grey border-2 flex items-center justify-center' href={settings?.link_youtube} target='_blank' >
                            <i className='icon-youtube text-[10px]'></i> 
                        </Link>
                    </div>
                </div>
            </div> 
        </div>
    );
};

export default NavTop;