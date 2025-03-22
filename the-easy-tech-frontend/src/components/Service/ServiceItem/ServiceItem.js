import React from 'react'
import Link from 'next/link'

const ServiceItem = ({service,i}) => {
    return <div className='service-item p-8 bg-white rounded-lg border border-line hover-box-shadow'>
        <Link className='service-item-main h-full' href="">
            <div className='heading flex items-center justify-between'>
                <i className={`${service.icon} text-blue md:text-6xl text-5xl`}></i>
                <div className='number heading3 text-placehover text-slate-400'>{i}</div> 
            </div>
            <div className='heading6 hover:text-blue duration-300 mt-6'>{service.title}</div>
            <div className='text-secondary mt-2'>{service.desc}</div>
        </Link>
    </div>
};

export default ServiceItem;