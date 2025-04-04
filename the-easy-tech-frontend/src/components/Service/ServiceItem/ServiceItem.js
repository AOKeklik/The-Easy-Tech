"use client"

import React, { useRef } from 'react'
import { useInView } from 'framer-motion'
import Link from 'next/link'

const ServiceItem = ({service,i}) => {
    const ref = useRef(null)
    const isInView=useInView(ref,{once:true})

    return <div 
        className='service-item p-8 bg-white rounded-lg border border-line hover-box-shadow'
        ref={ref}
        style={{ 
            transition:"all .7s cubic-bezier(.17,.55,.55,1) .3s",
            transform:isInView ? "translateY(0px)" : "translateY(60px)",
            opacity:isInView ? 1 : 0,
        }}
    >
        <Link 
            href="/service/service-detail/[slug]"
            as={`/service/service-details/${service.id}/${service.slug}`} 
            className='service-item-main h-full' 
        >
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